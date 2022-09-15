<?php

declare(strict_types=1);

namespace App\Game\Survivor;

final class Experiencie
{
    public function __construct(public readonly int $value)
    {
        if (0 > $this->value) {
            throw new \RuntimeException('Experience cannot be lower than 0');
        }
    }
}