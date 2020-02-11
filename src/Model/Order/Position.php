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
     */
    protected $quantity;

    /**
     * @var double
     * @tag(1079)
     * @precision(2)
     * @max(99999999.99)
     * @required
     */
    protected $price;

    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Position\VatType)
     * @required
     */
    protected $tax;

    /**
     * @var string
     * @maxLen(128)
     * @tag(1030)
     * @required
     */
    protected $text;

    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Position\PaymentType)
     * @tag(1214)
     * @required
     */
    protected $paymentMethodType;

    /**
     * @var int
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Position\SubjectType)
     * @tag(1212)
     * @required
     */
    protected $paymentSubjectType;

    /**
     * @var string|null
     * @tag(1162)
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
     * @tag(1226)
     * @regexp(\d{12})
     */
    protected $supplierINN;

    /**
     * @var int|null
     * @bitmap(\Pioniro\OrangeData\Model\Order\Position\AgentType)
     * @tag(1222)
     */
    protected $agentType;

    /**
     * @var AgentInfo|null
     * @tag(1223)
     */
    protected $agentInfo;

    /**
     * @var string|null
     * @maxLen(16)
     * @tag(1197)
     */
    protected $unitOfMeasurement;

    /**
     * @var string|null
     * @maxLen(64)
     * @tag(1191)
     */
    protected $additionalAttribute;

    /**
     * @var string|null
     * @regexp(\d{3})
     * @tag(1230)
     */
    protected $manufacturerCountryCode;

    /**
     * @var string|null
     * @maxLen(32)
     * @tag(1231)
     */
    protected $customsDeclarationNumber;

    /**
     * @var double|null
     * @tag(1229)
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
}