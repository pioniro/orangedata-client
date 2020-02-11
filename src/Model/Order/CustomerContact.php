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
}