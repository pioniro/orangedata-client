<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;
class AgentInfo
{
    /**
     * @var string|null
     * @tag(1075)
     * @name(Телефон оператора перевода)
     * @regexp(+\d{1,19})
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
     * @var array|string[]|null
     * @name(Телефон платежного агента)
     * @tag(1073)
     * @arrayRegexp(+\d{1,19})
     */
    protected $paymentAgentPhoneNumbers;

    /**
     * @var array|string[]|null
     * @name(Телефон оператора по приему платежей)
     * @tag(1074)
     * @arrayRegexp(+\d{1,19})
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
     * @name(Адрес оператора перевода)
     * @tag(1005)
     * @maxLen(243)
     */
    protected $paymentOperatorAddress;

    /**
     * @var string|null
     * @name(ИНН оператора перевода)
     * @tag(1016)
     * @regexp(\d{10,12})
     */
    protected $paymentOperatorINN;

    /**
     * @return array|null
     */
    public function getPaymentTransferOperatorPhoneNumbers(): ?array
    {
        return $this->paymentTransferOperatorPhoneNumbers;
    }

    /**
     * @param array|null $paymentTransferOperatorPhoneNumbers
     * @return AgentInfo
     */
    public function setPaymentTransferOperatorPhoneNumbers(?array $paymentTransferOperatorPhoneNumbers): self
    {
        $this->paymentTransferOperatorPhoneNumbers = $paymentTransferOperatorPhoneNumbers;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentAgentOperation(): ?string
    {
        return $this->paymentAgentOperation;
    }

    /**
     * @param string|null $paymentAgentOperation
     * @return AgentInfo
     */
    public function setPaymentAgentOperation(?string $paymentAgentOperation): self
    {
        $this->paymentAgentOperation = $paymentAgentOperation;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPaymentAgentPhoneNumbers(): ?array
    {
        return $this->paymentAgentPhoneNumbers;
    }

    /**
     * @param array|null $paymentAgentPhoneNumbers
     * @return AgentInfo
     */
    public function setPaymentAgentPhoneNumbers(?array $paymentAgentPhoneNumbers): self
    {
        $this->paymentAgentPhoneNumbers = $paymentAgentPhoneNumbers;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPaymentOperatorPhoneNumbers(): ?array
    {
        return $this->paymentOperatorPhoneNumbers;
    }

    /**
     * @param array|null $paymentOperatorPhoneNumbers
     * @return AgentInfo
     */
    public function setPaymentOperatorPhoneNumbers(?array $paymentOperatorPhoneNumbers): self
    {
        $this->paymentOperatorPhoneNumbers = $paymentOperatorPhoneNumbers;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentOperatorName(): ?string
    {
        return $this->paymentOperatorName;
    }

    /**
     * @param string|null $paymentOperatorName
     * @return AgentInfo
     */
    public function setPaymentOperatorName(?string $paymentOperatorName): self
    {
        $this->paymentOperatorName = $paymentOperatorName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentOperatorAddress(): ?string
    {
        return $this->paymentOperatorAddress;
    }

    /**
     * @param string|null $paymentOperatorAddress
     * @return AgentInfo
     */
    public function setPaymentOperatorAddress(?string $paymentOperatorAddress): self
    {
        $this->paymentOperatorAddress = $paymentOperatorAddress;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentOperatorINN(): ?string
    {
        return $this->paymentOperatorINN;
    }

    /**
     * @param string|null $paymentOperatorINN
     * @return AgentInfo
     */
    public function setPaymentOperatorINN(?string $paymentOperatorINN): self
    {
        $this->paymentOperatorINN = $paymentOperatorINN;
        return $this;
    }

    public function toArray(): array
    {

        $fields = [
            'paymentTransferOperatorPhoneNumbers',
            'paymentAgentOperation',
            'paymentAgentPhoneNumbers',
            'paymentOperatorPhoneNumbers',
            'paymentOperatorName',
            'paymentOperatorAddress',
            'paymentOperatorINN',
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
        return $data;
    }

}