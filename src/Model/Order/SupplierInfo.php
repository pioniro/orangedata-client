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
}