<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Position;
abstract class VatType
{
    public const VAT_20 = 1;
    public const VAT_10 = 2;
    public const VAT_20_120 = 3;
    public const VAT_10_110 = 4;
    public const VAT_0 = 5;
    public const VAT_NONE = 6;

    public static function all(): array
    {
        return [
            self::VAT_20,
            self::VAT_10,
            self::VAT_20_120,
            self::VAT_10_110,
            self::VAT_0,
            self::VAT_NONE,
        ];
    }
}