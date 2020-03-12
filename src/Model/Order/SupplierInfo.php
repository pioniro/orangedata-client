<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;
class SupplierInfo
{
    /**
     * @var string[]|null
     * @tag(1171)
     * @name(Телефон поставщика)
     * @array(string)
     * @arrayRegexp(+\d{1,19})
     */
    protected $phoneNumbers;

    /**
     * @var string|null
     * @tag(1225)
     * @name(Наименование поставщика)
     * @maxLen(239)
     */
    protected $name;

    /**
     * @return string|null
     */
    public function getPhoneNumbers(): ?string
    {
        return $this->phoneNumbers;
    }

    /**
     * @param string|null $phoneNumbers
     * @return $this
     */
    public function setPhoneNumbers(?string $phoneNumbers): self
    {
        $this->phoneNumbers = $phoneNumbers;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'phoneNumbers' => $this->phoneNumbers,
            'name' => $this->name,
        ];
    }
}