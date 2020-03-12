<?php
declare(strict_types=1);

namespace Pioniro\OrangeData;

use DateTime;
use Exception;
use Http\Client\Exception\HttpException;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Pioniro\OrangeData\Exception\ResponseException;
use Pioniro\OrangeData\Model\Order;
use Pioniro\OrangeData\Model\OrderDetails;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Client
{
    /**
     * @development https://apip.orangedata.ru:2443
     * @production https://api.orangedata.ru:12003
     * @var string
     */
    protected $url;

    /**
     * @var SignerInterface
     */
    protected $signer;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var RequestFactoryInterface
     */
    protected $requestFactory;

    /**
     * @var StreamFactoryInterface
     */
    protected $streamFactory;

    /**
     * Client constructor.
     * @param string $url
     * @param SignerInterface $signer
     * @param ClientInterface $httpClient
     * @param RequestFactoryInterface $requestFactory
     * @param StreamFactoryInterface $streamFactory
     */
    public function __construct(
        string $url,
        SignerInterface $signer,
        ClientInterface $httpClient = null,
        RequestFactoryInterface $requestFactory = null,
        StreamFactoryInterface $streamFactory = null
    ) {
        $this->url = $url;
        $this->signer = $signer;
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?: Psr17FactoryDiscovery::findStreamFactory();
    }

    /**
     * @param Order $order
     * @throws ClientExceptionInterface
     * @throws ResponseException
     * @throws \Http\Client\Exception
     */
    public function create(Order $order): void
    {
        $data = $order->toArray();
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $sign = $this->signer->sign($json);
        $request = $this->requestFactory->createRequest(
            'POST',
            rtrim($this->url, '/') . '/api/v2/documents/'
        )
            ->withHeader('Content-Type', 'application/json')
            ->withBody($this->streamFactory->createStream($json))
            ->withHeader('X-Signature', $sign);
        try {
            $response = $this->httpClient->sendRequest($request);
            switch ($response->getStatusCode()) {
                case 200:
                case 201:
                    return;
                default:
                    $content = $response->getBody()->getContents();
                    throw new ResponseException($data, $response->getStatusCode(), $content);
            }
        } catch (HttpException $e) {
            if ($e->getResponse()->getStatusCode() === 409) {
                return;
            }
            throw $e;
        }
    }

    /**
     * @param string $inn
     * @param string $id
     * @return OrderDetails|null
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function check(string $inn, string $id): ?OrderDetails
    {
        $request = $this->requestFactory->createRequest('GET',
            sprintf('%s/api/v2/documents/%s/status/%s', rtrim($this->url, '/'), $inn, $id));
        try {
            $response = $this->httpClient->sendRequest($request);
            if($response->getStatusCode() === 202){
                return null;
            }
            $json = $response->getBody()->getContents();
            $data = json_decode($json, true);
            if (json_last_error() !== JSON_ERROR_NONE || $response->getStatusCode() !== 200) {
                throw new ResponseException(
                    ['inn' => $inn, 'id' => $id],
                    $response->getStatusCode(),
                    $json,
                    ['order.id' => $id]
                );
            }
            return new OrderDetails(
                $data['id'],
                $data['deviceSN'],
                $data['deviceRN'],
                $data['fsNumber'],
                $data['ofdName'],
                $data['ofdWebsite'],
                $data['ofdinn'],
                $data['fnsWebsite'],
                $data['companyINN'],
                $data['companyName'],
                $data['documentNumber'],
                $data['shiftNumber'],
                $data['documentIndex'],
                new DateTime($data['processedAt']),
                new Order\Content(
                    $data['content']['type'],
                    isset($data['content']['positions']) ? array_map(function ($pos): Order\Position {
                        return new Order\Position(
                            $pos['quantity'],
                            $pos['price'],
                            $pos['tax'],
                            $pos['text'],
                            $pos['paymentMethodType'],
                            $pos['paymentSubjectType']
                        );
                    }, $data['content']['positions']) : [],
                    $data['content']['customerContact'],
                    new Order\CheckClose(
                        $data['content']['checkClose']['taxationSystem'],
                        isset($data['content']['checkClose']['payments']) ?
                            array_map(function ($payment): Order\Payment {
                                return new Order\Payment(
                                    $payment['type'],
                                    $payment['amount']
                                );
                            }, $data['content']['checkClose']['payments']) : []
                    )
                ),
                $data['change'],
                $data['fp'],
                isset($data['callbackUrl']) ? $data['callbackUrl'] : null
            );
        } catch (HttpException $e) {
            if ($e->getResponse()->getStatusCode() === 202) {
                return null;
            }
            throw $e;
        }
    }
}