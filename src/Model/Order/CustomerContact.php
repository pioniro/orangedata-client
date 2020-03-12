<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;
class CustomerContact
{
    /**
     * @var string|null
     * @tag(1085)
     * @maxLen(64)
     * @name(Наименование дополнительного реквизита пользователя)
     */
    protected $name;

    /**
     * @var string|null
     * @tag(1086)
     * @maxLen(234)
     * @name(Значение дополнительного реквизита пользователя)
     */
    protected $value;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return CustomerContact
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return CustomerContact
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}