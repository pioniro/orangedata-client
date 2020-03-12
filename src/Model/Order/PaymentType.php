<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

abstract class PaymentType
{
    /**
     * @tag(1031)
     * @name(сумма по чеку наличными)
     */
    public const CASH = 1;

    /**
     * @tag(1081)
     * @name(сумма по чеку безналичными)
     */
    public const CASHLESS = 2;

    /**
     * @tag(1215)
     * @name(сумма по чеку предоплатой (зачетом аванса и (или) предыдущих платежей))
     */
    public const PREPAID = 14;

    /**
     * @tag(1216)
     * @name(сумма по чеку постоплатой (в кредит))
     */
    public const POSTPAID = 15;

    /**
     * @tag(1217)
     * @name(сумма по чеку (БСО) встречным предоставлением,)
     */
    public const COUNTER_PROVISION = 16;

    public static function all(): array
    {
        return [
            self::CASH,
            self::CASHLESS,
            self::PREPAID,
            self::POSTPAID,
            self::COUNTER_PROVISION,
        ];
    }
}