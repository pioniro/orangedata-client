<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

use Webmozart\Assert\Assert;

class CheckClose
{
    /**
     * @var Payment[]
     */
    protected $payments;

    /**
     * @var int
     * @oneOfConst("Pioniro\OrangeData\Model\Order\CheckClose\TaxationSystemType")
     * @required
     * @tag(1055)
     * @name("Система налогообложения")
     */
    protected $taxationSystem;

    /**
     * CheckClose constructor.
     * @param int $taxationSystem
     * @param Payment[] $payments
     */
    public function __construct(int $taxationSystem, array $payments)
    {
        Assert::allIsInstanceOf($payments, Payment::class);
        $this->payments = $payments;
        $this->taxationSystem = $taxationSystem;
    }

    public function toArray(): array
    {
        $data = [
            'taxationSystem' => $this->taxationSystem,
            'payments' => []
        ];
        foreach ($this->payments as $payment) {
            $data['payments'][] = $payment->toArray();
        }
        return $data;
    }

    /**
     * @param $data
     * @return static
     */
    public static function fromArray($data)
    {
        return new static(
            $data['taxationSystem'],
            isset($data['payments']) ?
                array_map([Payment::class, 'fromArray'], $data['payments']) : []
        );
    }
}