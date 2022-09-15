<?php

declare(strict_types=1);

namespace App\Game\Zombie;

final class Name
{
    public function __construct(
        private readonly string $name
    ) {
    }

    public function getValue(): string
    {
        return $this->name;
    }
}