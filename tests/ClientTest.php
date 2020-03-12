<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Tests;

use Pioniro\OrangeData\Client;
use PHPUnit\Framework\TestCase;
use Pioniro\OrangeData\Model\Order;
use Pioniro\OrangeData\SignerInterface;

class ClientTest extends TestCase
{

    public function testSend()
    {
        $signer = $this->createMock(SignerInterface::class);
        $signer->method('sign')
            ->willReturn('some-sign');

        $httpClient = new \Http\Mock\Client();

//        $httpClient->
        $client = new Client('http://someurl.local/', $signer, $httpClient);
        $client->create($this->getOrder());
    }

    protected function getOrder(): Order
    {
        $order = new Order();
        return $order;
    }
}
