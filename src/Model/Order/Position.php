<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

use Pioniro\OrangeData\Model\Order\Position\SubjectType;
use Pioniro\OrangeData\Model\Order\Position\VatType;
use Webmozart\Assert\Assert;

class Position
{
    /**
     * @var double
     * @tag(1023)
     * @precision(6)
     * @max(281474976.710655)
     * @required
     * @name(Количество предмета расчета)
     */
    protected $quantity;

    /**
     * @var double
     * @tag(1079)
     * @precision(2)
     * @max(99999999.99)
     * @required
     * @name(Цена за единицу предмета расчета с учетом скидок и наценок)
     */
    protected $price;

    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Position\VatType)
     * @required
     * @name(Ставка НДС)
     * @tag(1199)
     */
    protected $tax;

    /**
     * @var string
     * @maxLen(128)
     * @tag(1030)
     * @required
     * @name(Наименование предмета расчета)
     */
    protected $text;

    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Position\PaymentType)
     * @tag(1214)
     * @required
     * @name(Признак способа расчета)
     */
    protected $paymentMethodType;

    /**
     * @var int
     * @name(Признак предмета расчета)
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Position\SubjectType)
     * @tag(1212)
     * @required
     */
    protected $paymentSubjectType;

    /**
     * @var string|null
     * @tag(1162)
     * @name(Код товарной номенклатуры)
     */
    protected $nomenclatureCode;

    /**
     * @var SupplierInfo|null
     * @tag(1224)
     * @name(Данные поставщика)
     */
    protected $supplierInfo;

    /**
     * @var string|null
     * @name(ИНН поставщика)
     * @tag(1226)
     * @regexp(\d{12})
     */
    protected $supplierINN;

    /**
     * @var int|null
     * @name(Признак агента по предмету расчета)
     * @bitmap(\Pioniro\OrangeData\Model\Order\Position\AgentType)
     * @tag(1222)
     */
    protected $agentType;

    /**
     * @var AgentInfo|null
     * @tag(1223)
     * @name(Данные агента)
     */
    protected $agentInfo;

    /**
     * @var string|null
     * @name(Единица измерения предмета расчета)
     * @maxLen(16)
     * @tag(1197)
     */
    protected $unitOfMeasurement;

    /**
     * @var string|null
     * @name(Дополнительный реквизит предмета расчета)
     * @maxLen(64)
     * @tag(1191)
     */
    protected $additionalAttribute;

    /**
     * @var string|null
     * @name(Код страны происхождения товара)
     * @regexp(\d{3})
     * @tag(1230)
     */
    protected $manufacturerCountryCode;

    /**
     * @var string|null
     * @maxLen(32)
     * @tag(1231)
     * @name(Номер таможенной декларации)
     */
    protected $customsDeclarationNumber;

    /**
     * @var double|null
     * @tag(1229)
     * @name(Акциз)
     * @precision(2)
     */
    protected $excise;

    /**
     * Position constructor.
     * @param float $quantity
     * @param float $price
     * @param int $tax
     * @param string $text
     * @param int $paymentMethodType
     * @param int $paymentSubjectType
     */
    public function __construct(
        float $quantity,
        float $price,
        int $tax,
        string $text,
        int $paymentMethodType,
        int $paymentSubjectType
    ) {
        Assert::lessThan($quantity, 281474976.710655);
        Assert::lessThan($price, 99999999.99);
        Assert::oneOf($tax, VatType::all());
        Assert::maxLength($text, 128);
        Assert::oneOf($paymentMethodType, Position\PaymentType::all());
        Assert::oneOf($paymentSubjectType, SubjectType::all());
        $this->quantity = $quantity;
        $this->price = $price;
        $this->tax = $tax;
        $this->text = $text;
        $this->paymentMethodType = $paymentMethodType;
        $this->paymentSubjectType = $paymentSubjectType;
    }

    public function toArray(): array
    {
        $fields = [
            'tax',
            'text',
            'paymentMethodType',
            'paymentSubjectType',
            'nomenclatureCode',
            'supplierInfo',
            'supplierINN',
            'agentType',
            'agentInfo',
            'unitOfMeasurement',
            'additionalAttribute',
            'manufacturerCountryCode',
            'customsDeclarationNumber',
        ];
        $data = [];
        foreach ($fields as $field) {
            $value = $this->$field;
            if (is_object($value)) {
                $data[$field] = $value->toArray();
            } else {
                $data[$field] = $value;
            }
        }
        $data['quantity'] = round($this->quantity, 6);
        $data['price'] = round($this->price, 2);
        $data['excise'] = $this->excise ? round($this->excise, 2): null;
        return array_filter($data, function ($v) {
            return !is_null($v);
        });
    }
}