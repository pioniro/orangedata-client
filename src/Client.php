<?php
declare(strict_types=1);

namespace Pioniro\OrangeData;

use Pioniro\OrangeData\Model\Order;

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

    public function send(Order $order)
    {

    }
}