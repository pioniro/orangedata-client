<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order;

class PaymentType
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
    public const CASHLESS = 1;

    /**
     * @tag(1215)
     * @name(сумма по чеку предоплатой (зачетом аванса и (или) предыдущих платежей))
     */
    public const PREPAID = 1;

    /**
     * @tag(1216)
     * @name(сумма по чеку постоплатой (в кредит))
     */
    public const POSTPAID = 1;

    /**
     * @tag(1217)
     * @name(сумма по чеку (БСО) встречным предоставлением,)
     */
    public const COUNTER_PROVISION = 1;

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