<?php

declare(strict_types=1);

namespace App\Game\Zombie;

use App\Game\Zombie\Exception\ZombieCannotHaveLessThanZeroHealthPointException;
use App\Game\Zombie\Exception\ZombieCannotHaveMoreThanOneHealthPointException;

final class HealthPoints
{
    public function __construct(
        private readonly int $healthPoints = 1
    ){
        if (0 > $this->healthPoints) {
            throw new ZombieCannotHaveLessThanZeroHealthPointException();
        }

        if (1 < $this->healthPoints) {
            throw new ZombieCannotHaveMoreThanOneHealthPointException();
        }
    }

    public function getValue(): int
    {
        return $this->healthPoints;
    }
}