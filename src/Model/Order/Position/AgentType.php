<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Position;
abstract class AgentType
{
    public const BANK_PAYMENT_AGENT = 1;
    public const BANK_PAYMENT_SUBAGENT = 2;
    public const PAYMENT_AGENT = 4;
    public const PAYMENT_SUBAGENT = 8;
    public const AUTHENTICATED = 16;
    public const COMMISSION_AGENT = 32;
    public const OTHER_AGENT = 64;
}