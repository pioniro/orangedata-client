<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

class Payment
{
    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\CheckClose\TaxationSystemType)
     */
    protected $type;

    /**
     * @var double
     * @max(99999999.99)
     * @required
     */
    protected $amount;
}