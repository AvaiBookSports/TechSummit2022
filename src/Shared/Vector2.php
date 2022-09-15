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

    }
}