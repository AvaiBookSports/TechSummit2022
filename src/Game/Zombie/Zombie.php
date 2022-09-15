<?php

declare(strict_types=1);

namespace App\Game\Zombie;

use App\Shared\Vector2;

final class Zombie
{
    public function __construct(
        private Name $name,
        private HealthPoints $healthPoints,
        private Vector2 $position
    ) {
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getHealhPoints(): HealthPoints
    {
        return $this->healthPoints;
    }

    public function getPosition(): Vector2
    {
        return $this->position;
    }
}