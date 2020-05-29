<?php
declare(strict_types=1);

namespace Pioniro\OrangeData\Model\Order\Content\CorrectionContent;

abstract class CorrectionType
{
    public const SELF = 0;
    public const MUST = 1;

    public function all(): array
    {
        return [
            self::SELF,
            self::MUST,
        ];
    }
}