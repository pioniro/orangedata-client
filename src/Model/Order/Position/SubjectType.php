<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Position;
abstract class SubjectType
{
    /** @name(Товар) */
    public const GOODS = 1;
    /** @name(Подакцизный товар) */
    public const EXCISABLE_GOODS = 2;
    public const JOB = 3;
    public const SERVICE = 4;
    public const GAMBLING_BID = 5;
    /** @name(азартная игра) */
    public const GAMBLING_WIN = 6;
    /** @name(лотерейный билет) */
    public const LOTTERY_TICKET = 7;
    /** @name(Выигрыш лотереи) */
    public const LOTTERY_WIN = 8;
    /** @name(предоставление результат интеллектуальной деятельности) */
    public const PROVIDING_INTELLECTUAL_PROPERTY = 9;
    /** @name(Платеж) */
    public const PAYMENT = 10;
    /** @name(Агентское вознаграждение) */
    public const AGENTS_COMMISSION = 11;
    /** @name(Составной предмет расчета) */
    public const COMPOUND_SUBJECT = 12;
    /** @name(Иной предмет расчета) */
    public const OTHER_SUBJECT = 13;
    /** @name(Имущественное право) */
    public const PROPERTY_LAW = 14;
    /** @name(Внереализационный доход) */
    public const NON_OPERATING_INCOME = 15;
    /** @name(Страховые взносы) */
    public const INSURANCE_PREMIUMS = 16;
    /** @name(Торговый сбор) */
    public const TRADING_FEE = 17;
    /** @name(Курортный сбор) */
    public const RESORT_FEE = 18;
    /** @name(Залог) */
    public const DEPOSIT = 19;

    public static function all(): array
    {
        return [
            self::GOODS,
            self::EXCISABLE_GOODS,
            self::JOB,
            self::SERVICE,
            self::GAMBLING_BID,
            self::GAMBLING_WIN,
            self::LOTTERY_TICKET,
            self::LOTTERY_WIN,
            self::PROVIDING_INTELLECTUAL_PROPERTY,
            self::PAYMENT,
            self::AGENTS_COMMISSION,
            self::COMPOUND_SUBJECT,
            self::OTHER_SUBJECT,
            self::PROPERTY_LAW,
            self::NON_OPERATING_INCOME,
            self::INSURANCE_PREMIUMS,
            self::TRADING_FEE,
            self::RESORT_FEE,
            self::DEPOSIT,
        ];
    }

}