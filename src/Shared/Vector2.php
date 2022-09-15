<?php

declare(strict_types=1);

namespace App\Shared;

final class Vector2
{
    public function __construct(
        public readonly int $x,
        public readonly int $y,
    )
    {
        if (0 > $this->x) {
            throw new \RuntimeException('X axis cannot be lower than 0');
        }

        if (0 > $this->y) {
            throw new \RuntimeException('Y axis cannot be lower than 0');
        }
    }
}