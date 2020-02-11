<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

class CheckClose
{
    /**
     * @var Payment[]
     */
    protected $payments;

    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\CheckClose\TaxationSystemType)
     * @required
     */
    protected $taxationSystem;
}