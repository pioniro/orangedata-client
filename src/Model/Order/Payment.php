<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

class Payment
{
    /**
     * @var int
     * @oneOfConst("Pioniro\OrangeData\Model\Order\PaymentType")
     */
    protected $type;

    /**
     * @var double
     * @max(99999999.99)
     * @required
     */
    protected $amount;

    /**
     * Payment constructor.
     * @param int $type
     * @param float $amount
     */
    public function __construct(int $type, float $amount)
    {
        $this->type = $type;
        $this->amount = $amount;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'amount' => round($this->amount, 2)
        ];
    }
}