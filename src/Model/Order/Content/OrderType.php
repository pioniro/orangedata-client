<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Content;

abstract class OrderType
{
    public const INCOME = 1;
    public const REFUND_OF_INCOME = 2;
    public const EXPENSE = 3;
    public const REFUND_OF_EXPENSE = 4;

    public static function all()
    {
        return [
            self::INCOME,
            self::REFUND_OF_INCOME,
            self::EXPENSE,
            self::REFUND_OF_EXPENSE
        ];
    }
}