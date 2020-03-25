<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Position;

abstract class PaymentType
{
    /** @name("Предоплата 100%") */
    public const FULL_PREPAID = 1;

    /** @name("Частичная предоплата") */
    public const PARTIAL_PREPAID = 2;

    /** @name("Аванс") */
    public const PREPAID_EXPENSE = 3;

    /** @name("Полный расчет") */
    public const FULL_PAYMENT = 4;

    /** @name("Частичный расчет и кредит") */
    public const PARTIAL_PAYMENT_AND_CREDIT = 5;

    /** @name("Передача в кредит") */
    public const TRANSFER_ON_CREDIT = 6;

    /** @name("оплата кредита") */
    public const LOAN_PAYMENT = 7;

    public static function all(): array
    {
        return [
            self::FULL_PREPAID,
            self::PARTIAL_PREPAID,
            self::PREPAID_EXPENSE,
            self::FULL_PAYMENT,
            self::PARTIAL_PAYMENT_AND_CREDIT,
            self::TRANSFER_ON_CREDIT,
            self::LOAN_PAYMENT,
        ];
    }
}