<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;
abstract class AbstractContent
{
    /**
     * @var string|null
     * @name(Номер автомата)
     * @tag(1036)
     * @maxLen(20)
     */
    protected $automatNumber;

    /**
     * @var string|null
     * @tag(1009)
     * @name(Адрес расчетов)
     * @maxLen(243)
     */
    protected $settlementAddress;

    /**
     * @var string|null
     * @tag(1187)
     * @name(Место расчетов)
     * @maxLen(243)
     */
    protected $settlementPlace;

    /**
     * @return string|null
     */
    public function getAutomatNumber(): ?string
    {
        return $this->automatNumber;
    }

    /**
     * @return string|null
     */
    public function getSettlementAddress(): ?string
    {
        return $this->settlementAddress;
    }

    /**
     * @return string|null
     */
    public function getSettlementPlace(): ?string
    {
        return $this->settlementPlace;
    }

    /**
     * @param string|null $automatNumber
     * @return $this
     */
    public function setAutomatNumber(?string $automatNumber)
    {
        $this->automatNumber = $automatNumber;
        return $this;
    }

    /**
     * @param string|null $settlementAddress
     * @return $this
     */
    public function setSettlementAddress(?string $settlementAddress)
    {
        $this->settlementAddress = $settlementAddress;
        return $this;
    }

    /**
     * @param string|null $settlementPlace
     * @return $this
     */
    public function setSettlementPlace(?string $settlementPlace)
    {
        $this->settlementPlace = $settlementPlace;
        return $this;
    }

    public abstract function toArray(): array;

    public abstract static function fromArray($data);
}