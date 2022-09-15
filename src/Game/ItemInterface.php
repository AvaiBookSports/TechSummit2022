<?php

declare(strict_types=1);

namespace Game;

interface ItemInterface
{
    public function __construct(
        string $name,
        int $range,
        int $damage,
    );
}