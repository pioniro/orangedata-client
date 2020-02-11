<?php
declare(strict_types=1);

namespace Pioniro\OrangeData;

interface SignerInterface
{
    public function sign($data): string;
}