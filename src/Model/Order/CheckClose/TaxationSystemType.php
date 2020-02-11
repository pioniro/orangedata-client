<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\CheckClose;

abstract class TaxationSystemType
{
    /** @name(Общая, ОСН) */
    public const GENERAL = 0;
    /** @name(Упрощенная доход, УСН доход) */
    public const SIMPLIFIED_INCOME = 1;
    /** @name(Упрощенная доход минус расход, УСН доход - расход) */
    public const SIMPLIFIED_INCOME_EXPENSE = 2;
    /** @name(Единый налог на вмененный доход, ЕНВД) */
    public const SINGLE_INCOME = 3;
    /** @name(Единый сельскохозяйственный налог, ЕСН) */
    public const AGRICULTURE = 4;
    /** @name(Патентная система налогообложения, Патент) */
    public const PATENT = 5;
}