<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Content;

use DateTime;
use Pioniro\OrangeData\Model\Order\AbstractContent;

class CorrectionContent extends AbstractContent
{
    /**
     * @var int
     * @tag(1173)
     * @oneOfConst(Pioniro\OrangeData\Model\Order\Content\CorrectionContent\CorrectionType)
     * @required
     */
    protected $correctionType;

    /**
     * @var int
     * @tag(1054)
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Content\CorrectionContent\OrderType)
     * @required
     */
    protected $type;

    /**
     * @var DateTime
     * @tag(1178)
     * @required
     */
    protected $causeDocumentDate;

    /**
     * @var string
     * @tag(1179)
     * @maxLen(32)
     * @required
     */
    protected $causeDocumentNumber;

    /**
     * @var float
     * @tag(1020)
     * @precision(2)
     * @max(99999999.99)
     * @required
     */
    protected $totalSum;

    /**
     * @var float|null
     * @tag(1031)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $cashSum;

    /**
     * @var float|null
     * @tag(1081)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $eCashSum;

    /**
     * @var float|null
     * @tag(1215)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $prepaymentSum;

    /**
     * @var float|null
     * @tag(1216)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $postpaymentSum;

    /**
     * @var float|null
     * @tag(1217)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $otherPaymentTypeSum;

    /**
     * @var float|null
     * @tag(1102)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $tax1Sum;

    /**
     * @var float|null
     * @tag(1103)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $tax2sum;

    /**
     * @var float|null
     * @tag(1104)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $tax3Sum;

    /**
     * @var float|null
     * @tag(1105)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $tax4Sum;

    /**
     * @var float|null
     * @tag(1106)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $tax5Sum;

    /**
     * @var float|null
     * @tag(1107)
     * @precision(2)
     * @max(99999999.99)
     */
    protected $tax6Sum;

    /**
     * @var int|null
     * @tag(1055)
     * @oneOfConst("Pioniro\OrangeData\Model\Order\CheckClose\TaxationSystemType")
     */
    protected $taxationSystem;

    /**
     * CorrectionContent constructor.
     * @param int $correctionType
     * @param int $type
     * @param DateTime $causeDocumentDate
     * @param string $causeDocumentNumber
     * @param float $totalSum
     */
    public function __construct(
        int $correctionType,
        int $type,
        DateTime $causeDocumentDate,
        string $causeDocumentNumber,
        float $totalSum
    ) {
        $this->correctionType = $correctionType;
        $this->type = $type;
        $this->causeDocumentDate = $causeDocumentDate;
        $this->causeDocumentNumber = $causeDocumentNumber;
        $this->totalSum = $totalSum;
    }

    /**
     * @return int
     */
    public function getCorrectionType(): int
    {
        return $this->correctionType;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return DateTime
     */
    public function getCauseDocumentDate(): DateTime
    {
        return $this->causeDocumentDate;
    }

    /**
     * @return string
     */
    public function getCauseDocumentNumber(): string
    {
        return $this->causeDocumentNumber;
    }

    /**
     * @return float
     */
    public function getTotalSum(): float
    {
        return $this->totalSum;
    }

    /**
     * @return float|null
     */
    public function getCashSum(): ?float
    {
        return $this->cashSum;
    }

    /**
     * @return float|null
     */
    public function getECashSum(): ?float
    {
        return $this->eCashSum;
    }

    /**
     * @return float|null
     */
    public function getPrepaymentSum(): ?float
    {
        return $this->prepaymentSum;
    }

    /**
     * @return float|null
     */
    public function getPostpaymentSum(): ?float
    {
        return $this->postpaymentSum;
    }

    /**
     * @return float|null
     */
    public function getOtherPaymentTypeSum(): ?float
    {
        return $this->otherPaymentTypeSum;
    }

    /**
     * @return float|null
     */
    public function getTax1Sum(): ?float
    {
        return $this->tax1Sum;
    }

    /**
     * @return float|null
     */
    public function getTax2sum(): ?float
    {
        return $this->tax2sum;
    }

    /**
     * @return float|null
     */
    public function getTax3Sum(): ?float
    {
        return $this->tax3Sum;
    }

    /**
     * @return float|null
     */
    public function getTax4Sum(): ?float
    {
        return $this->tax4Sum;
    }

    /**
     * @return float|null
     */
    public function getTax5Sum(): ?float
    {
        return $this->tax5Sum;
    }

    /**
     * @return float|null
     */
    public function getTax6Sum(): ?float
    {
        return $this->tax6Sum;
    }

    /**
     * @return int|null
     */
    public function getTaxationSystem(): ?int
    {
        return $this->taxationSystem;
    }

    /**
     * @param float|null $cashSum
     * @return CorrectionContent
     */
    public function setCashSum(?float $cashSum): CorrectionContent
    {
        $this->cashSum = $cashSum;
        return $this;
    }

    /**
     * @param float|null $eCashSum
     * @return CorrectionContent
     */
    public function setECashSum(?float $eCashSum): CorrectionContent
    {
        $this->eCashSum = $eCashSum;
        return $this;
    }

    /**
     * @param float|null $prepaymentSum
     * @return CorrectionContent
     */
    public function setPrepaymentSum(?float $prepaymentSum): CorrectionContent
    {
        $this->prepaymentSum = $prepaymentSum;
        return $this;
    }

    /**
     * @param float|null $postpaymentSum
     * @return CorrectionContent
     */
    public function setPostpaymentSum(?float $postpaymentSum): CorrectionContent
    {
        $this->postpaymentSum = $postpaymentSum;
        return $this;
    }

    /**
     * @param float|null $otherPaymentTypeSum
     * @return CorrectionContent
     */
    public function setOtherPaymentTypeSum(?float $otherPaymentTypeSum): CorrectionContent
    {
        $this->otherPaymentTypeSum = $otherPaymentTypeSum;
        return $this;
    }

    /**
     * @param float|null $tax1Sum
     * @return CorrectionContent
     */
    public function setTax1Sum(?float $tax1Sum): CorrectionContent
    {
        $this->tax1Sum = $tax1Sum;
        return $this;
    }

    /**
     * @param float|null $tax2sum
     * @return CorrectionContent
     */
    public function setTax2sum(?float $tax2sum): CorrectionContent
    {
        $this->tax2sum = $tax2sum;
        return $this;
    }

    /**
     * @param float|null $tax3Sum
     * @return CorrectionContent
     */
    public function setTax3Sum(?float $tax3Sum): CorrectionContent
    {
        $this->tax3Sum = $tax3Sum;
        return $this;
    }

    /**
     * @param float|null $tax4Sum
     * @return CorrectionContent
     */
    public function setTax4Sum(?float $tax4Sum): CorrectionContent
    {
        $this->tax4Sum = $tax4Sum;
        return $this;
    }

    /**
     * @param float|null $tax5Sum
     * @return CorrectionContent
     */
    public function setTax5Sum(?float $tax5Sum): CorrectionContent
    {
        $this->tax5Sum = $tax5Sum;
        return $this;
    }

    /**
     * @param float|null $tax6Sum
     * @return CorrectionContent
     */
    public function setTax6Sum(?float $tax6Sum): CorrectionContent
    {
        $this->tax6Sum = $tax6Sum;
        return $this;
    }

    /**
     * @param int|null $taxationSystem
     * @return CorrectionContent
     */
    public function setTaxationSystem(?int $taxationSystem): CorrectionContent
    {
        $this->taxationSystem = $taxationSystem;
        return $this;
    }

    public function toArray(): array
    {
        $fields = [
            'correctionType',
            'type',
            'causeDocumentNumber',
            'totalSum',
            'cashSum',
            'eCashSum',
            'prepaymentSum',
            'postpaymentSum',
            'otherPaymentTypeSum',
            'tax1Sum',
            'tax2Sum',
            'tax3Sum',
            'tax4Sum',
            'tax5Sum',
            'tax6Sum',
            'taxationSystem',
            'automatNumber',
            'settlementAddress',
            'settlementPlace',
        ];
        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $this->$field;
        }
        $data['causeDocumentDate'] = $this->causeDocumentDate->format(DateTime::ATOM);
        return array_filter($data, function ($v) {
            return !is_null($v);
        });
    }

    public static function fromArray($data)
    {
        $fields = [
            'cashSum',
            'eCashSum',
            'prepaymentSum',
            'postpaymentSum',
            'otherPaymentTypeSum',
            'tax1Sum',
            'tax2Sum',
            'tax3Sum',
            'tax4Sum',
            'tax5Sum',
            'tax6Sum',
            'taxationSystem',
            'automatNumber',
            'settlementAddress',
            'settlementPlace',
        ];
        $content = new static(
            $data['correctionType'],
            $data['type'],
            new DateTime($data['causeDocumentDate']),
            $data['causeDocumentNumber'],
            $data['totalSum'],
        );
        foreach ($fields as $field) {
            $content->{'set' . ucfirst($field)}($data[$field]);
        }
        return $content;
    }
}