<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

use Pioniro\OrangeData\Model\Order\Content\OrderType;
use Webmozart\Assert\Assert;

class Content
{
    /**
     * @var int
     * @tag(1054)
     * @oneOfConst(\Pioniro\OrangeData\Model\Order\Content\OrderType)
     * @required
     */
    protected $type;

    /**
     * @var Position[]
     * @tag(1059)
     * @required
     */
    protected $positions;

    /**
     * @var CheckClose
     * @required
     */
    protected $checkClose;

    /**
     * @var string
     * @required
     * @maxLen(64)
     * @regexp((\+\d+$)|([^@]+@[^@]+$))
     */
    protected $customerContact;

    /**
     * @var int|null
     * @bitmap(\Pioniro\OrangeData\Model\Order\Content\AgentType)
     * @tag(1057)
     */
    protected $agentType;

    /**
     * @var string[]|null
     * @tag(1075)
     * @name(Телефон оператора перевода)
     * @array(string)
     * @arrayRegex(\+\d{1,19})
     */
    protected $paymentTransferOperatorPhoneNumbers;

    /**
     * @var string|null
     * @tag(1044)
     * @name(Операция платежного агента)
     * @maxLen(24)
     */
    protected $paymentAgentOperation;

    /**
     * @var string[]|null
     * @tag(1073)
     * @name(Телефон платежного агента)
     * @array(string)
     * @arrayRegex(\+\d{1,19})
     */
    protected $paymentAgentPhoneNumbers;

    /**
     * @var string[]|null
     * @tag(1074)
     * @name(Телефон оператора по приему платежей)
     * @array(string)
     * @arrayRegex(\+\d{1,19})
     */
    protected $paymentOperatorPhoneNumbers;

    /**
     * @var string|null
     * @name(Наименование оператора перевода)
     * @tag(1026)
     * @maxLen(64)
     */
    protected $paymentOperatorName;

    /**
     * @var string|null
     * @tag(1005)
     * @name(Адрес оператора перевода)
     * @maxLen(243)
     */
    protected $paymentOperatorAddress;

    /**
     * @var string|null
     * @tag(1016)
     * @name(ИНН оператора перевода)
     * @regexp(\d{10,12})
     */
    protected $paymentOperatorINN;

    /**
     * @var string[]|null
     * @tag(1171)
     * @name(Телефон поставщика)
     * @array(string)
     * @arrayRegexp(\+\d{1,19})
     */
    protected $supplierPhoneNumbers;

    /**
     * @var AdditionalUserAttribute|null
     * @tag(1084)
     * @name(Дополнительный реквизит пользователя)
     */
    protected $additionalUserAttribute;

    /**
     * @var string|null
     * @maxLen(16)
     * @tag(1192)
     * @name(Дополнительный реквизит чека(БСО))
     */
    protected $additionalAttribute;

    /**
     * @var string|null
     * @name(Номер автомата)
     * @tag(1036)
     * @maxLen(20)
     */
    protected $automateNumber;

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
     * @var string|null
     * @tag(1227)
     * @name(Покупатель (клиент))
     * @maxLen(243)
     */
    protected $customer;

    /**
     * @var string|null
     * @tag(1228)
     * @name(ИНН покупателя (клиента))
     * @regexp(\d{10,12})
     */
    protected $customerINN;

    /**
     * @var string|null
     * @tag(1021)
     * @name(Кассир)
     * @maxLen(64)
     */
    protected $cashier;

    /**
     * @var string|null
     * @tag(1203)
     * @name(ИНН кассира)
     * @regexp(\d{12})
     */
    protected $cashierINN;

    /**
     * @var string|null
     * @tag(1117)
     * @name(Адрес электронной почты отправителя чека)
     * @maxLen(64)
     */
    protected $senderEmail;

    /**
     * Content constructor.
     * @param int $type
     * @param Position[] $positions
     * @param string $customerContact
     * @param CheckClose $checkClose
     */
    public function __construct(int $type, array $positions, string $customerContact, CheckClose $checkClose)
    {
        Assert::oneOf($type, OrderType::all());
        Assert::allIsInstanceOf($positions, Position::class);
        $this->type = $type;
        $this->positions = $positions;
        $this->customerContact = $customerContact;
        $this->checkClose = $checkClose;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return Position[]
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * @param CheckClose|null $checkClose
     * @return Content
     */
    public function setCheckClose(?CheckClose $checkClose): Content
    {
        $this->checkClose = $checkClose;
        return $this;
    }

    /**
     * @return CheckClose|null
     */
    public function getCheckClose(): ?CheckClose
    {
        return $this->checkClose;
    }

    /**
     * @return string
     */
    public function getCustomerContact(): string
    {
        return $this->customerContact;
    }

    /**
     * @return int|null
     */
    public function getAgentType(): ?int
    {
        return $this->agentType;
    }

    /**
     * @return string[]|null
     */
    public function getPaymentTransferOperatorPhoneNumbers(): ?array
    {
        return $this->paymentTransferOperatorPhoneNumbers;
    }

    /**
     * @return string|null
     */
    public function getPaymentAgentOperation(): ?string
    {
        return $this->paymentAgentOperation;
    }

    /**
     * @return string[]|null
     */
    public function getPaymentAgentPhoneNumbers(): ?array
    {
        return $this->paymentAgentPhoneNumbers;
    }

    /**
     * @return string[]|null
     */
    public function getPaymentOperatorPhoneNumbers(): ?array
    {
        return $this->paymentOperatorPhoneNumbers;
    }

    /**
     * @return string|null
     */
    public function getPaymentOperatorName(): ?string
    {
        return $this->paymentOperatorName;
    }

    /**
     * @return string|null
     */
    public function getPaymentOperatorAddress(): ?string
    {
        return $this->paymentOperatorAddress;
    }

    /**
     * @return string|null
     */
    public function getPaymentOperatorINN(): ?string
    {
        return $this->paymentOperatorINN;
    }

    /**
     * @return string[]|null
     */
    public function getSupplierPhoneNumbers(): ?array
    {
        return $this->supplierPhoneNumbers;
    }

    /**
     * @return AdditionalUserAttribute|null
     */
    public function getAdditionalUserAttribute(): ?AdditionalUserAttribute
    {
        return $this->additionalUserAttribute;
    }

    /**
     * @return string|null
     */
    public function getAdditionalAttribute(): ?string
    {
        return $this->additionalAttribute;
    }

    /**
     * @return string|null
     */
    public function getAutomateNumber(): ?string
    {
        return $this->automateNumber;
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
     * @return string|null
     */
    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    /**
     * @return string|null
     */
    public function getCustomerINN(): ?string
    {
        return $this->customerINN;
    }

    /**
     * @return string|null
     */
    public function getCashier(): ?string
    {
        return $this->cashier;
    }

    /**
     * @return string|null
     */
    public function getCashierINN(): ?string
    {
        return $this->cashierINN;
    }

    /**
     * @return string|null
     */
    public function getSenderEmail(): ?string
    {
        return $this->senderEmail;
    }

    /**
     * @param int|null $agentType
     * @return Content
     */
    public function setAgentType(?int $agentType): Content
    {
        $this->agentType = $agentType;
        return $this;
    }

    /**
     * @param int|null $agentType
     * @return Content
     */
    public function setOnAgentType(int $agentType): Content
    {
        $this->agentType |= $agentType;
        return $this;
    }

    /**
     * @param int|null $agentType
     * @return bool
     */
    public function checkOnAgentType(int $agentType): bool
    {
        return ($this->agentType & $agentType) > 0;
    }

    /**
     * @param string[]|null $paymentTransferOperatorPhoneNumbers
     * @return Content
     */
    public function setPaymentTransferOperatorPhoneNumbers(?array $paymentTransferOperatorPhoneNumbers)
    {
        $this->paymentTransferOperatorPhoneNumbers = $paymentTransferOperatorPhoneNumbers;
        return $this;
    }

    /**
     * @param string|null $paymentAgentOperation
     * @return Content
     */
    public function setPaymentAgentOperation(?string $paymentAgentOperation)
    {
        $this->paymentAgentOperation = $paymentAgentOperation;
        return $this;
    }

    /**
     * @param string[]|null $paymentAgentPhoneNumbers
     * @return Content
     */
    public function setPaymentAgentPhoneNumbers(?array $paymentAgentPhoneNumbers)
    {
        $this->paymentAgentPhoneNumbers = $paymentAgentPhoneNumbers;
        return $this;
    }

    /**
     * @param string[]|null $paymentOperatorPhoneNumbers
     * @return Content
     */
    public function setPaymentOperatorPhoneNumbers(?array $paymentOperatorPhoneNumbers)
    {
        $this->paymentOperatorPhoneNumbers = $paymentOperatorPhoneNumbers;
        return $this;
    }

    /**
     * @param string|null $paymentOperatorName
     * @return Content
     */
    public function setPaymentOperatorName(?string $paymentOperatorName)
    {
        $this->paymentOperatorName = $paymentOperatorName;
        return $this;
    }

    /**
     * @param string|null $paymentOperatorAddress
     * @return Content
     */
    public function setPaymentOperatorAddress(?string $paymentOperatorAddress)
    {
        $this->paymentOperatorAddress = $paymentOperatorAddress;
        return $this;
    }

    /**
     * @param string|null $paymentOperatorINN
     * @return Content
     */
    public function setPaymentOperatorINN(?string $paymentOperatorINN)
    {
        $this->paymentOperatorINN = $paymentOperatorINN;
        return $this;
    }

    /**
     * @param string[]|null $supplierPhoneNumbers
     * @return Content
     */
    public function setSupplierPhoneNumbers(?array $supplierPhoneNumbers)
    {
        $this->supplierPhoneNumbers = $supplierPhoneNumbers;
        return $this;
    }

    /**
     * @param AdditionalUserAttribute|null $additionalUserAttribute
     * @return Content
     */
    public function setAdditionalUserAttribute(?AdditionalUserAttribute $additionalUserAttribute)
    {
        $this->additionalUserAttribute = $additionalUserAttribute;
        return $this;
    }

    /**
     * @param string|null $additionalAttribute
     * @return Content
     */
    public function setAdditionalAttribute(?string $additionalAttribute)
    {
        $this->additionalAttribute = $additionalAttribute;
        return $this;
    }

    /**
     * @param string|null $automateNumber
     * @return Content
     */
    public function setAutomateNumber(?string $automateNumber)
    {
        $this->automateNumber = $automateNumber;
        return $this;
    }

    /**
     * @param string|null $settlementAddress
     * @return Content
     */
    public function setSettlementAddress(?string $settlementAddress)
    {
        $this->settlementAddress = $settlementAddress;
        return $this;
    }

    /**
     * @param string|null $settlementPlace
     * @return Content
     */
    public function setSettlementPlace(?string $settlementPlace)
    {
        $this->settlementPlace = $settlementPlace;
        return $this;
    }

    /**
     * @param string|null $customer
     * @return Content
     */
    public function setCustomer(?string $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @param string|null $customerINN
     * @return Content
     */
    public function setCustomerINN(?string $customerINN)
    {
        $this->customerINN = $customerINN;
        return $this;
    }

    /**
     * @param string|null $cashier
     * @return Content
     */
    public function setCashier(?string $cashier)
    {
        $this->cashier = $cashier;
        return $this;
    }

    /**
     * @param string|null $cashierINN
     * @return Content
     */
    public function setCashierINN(?string $cashierINN)
    {
        $this->cashierINN = $cashierINN;
        return $this;
    }

    /**
     * @param string|null $senderEmail
     * @return Content
     */
    public function setSenderEmail(?string $senderEmail)
    {
        $this->senderEmail = $senderEmail;
        return $this;
    }

    public function toArray(): array
    {
        $fields = [
            'type',
            'checkClose',
            'customerContact',
            'agentType',
            'paymentTransferOperatorPhoneNumbers',
            'paymentAgentOperation',
            'paymentAgentPhoneNumbers',
            'paymentOperatorPhoneNumbers',
            'paymentOperatorName',
            'paymentOperatorAddress',
            'paymentOperatorINN',
            'supplierPhoneNumbers',
            'additionalUserAttribute',
            'additionalAttribute',
            'automateNumber',
            'settlementAddress',
            'settlementPlace',
            'customer',
            'customerINN',
            'cashier',
            'cashierINN',
            'senderEmail',
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
        $data['positions'] = array_map(function (Position $position): array {
            return $position->toArray();
        }, $this->positions);
        return array_filter($data, function ($v) {
            return !is_null($v);
        });
    }

    public static function fromArray($data)
    {
        return new static(
            $data['type'],
            isset($data['positions']) ? array_map([Position::class, 'fromArray'], $data['positions']) : [],
            $data['customerContact'],
            CheckClose::fromArray($data['checkClose'])
        );
    }
}