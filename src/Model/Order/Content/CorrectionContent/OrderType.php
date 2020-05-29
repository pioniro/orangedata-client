<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Content\CorrectionContent;

use Pioniro\OrangeData\Model\Order\Content\OrderType as CommonOrderType;

abstract class OrderType
{
    public const INCOME = CommonOrderType::INCOME;
    public const EXPENSE = CommonOrderType::EXPENSE;

    public function all(): array
    {
        return [
            self::INCOME,
            self::EXPENSE,
        ];
    }
}