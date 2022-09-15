<?php

declare(strict_types=1);

namespace App\Game\Zombie;

use App\Game\Zombie\HealthPoints;
use App\Game\Zombie\Name;
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
        return $this->name->getValue();
    }

    public function getHealhPoints(): HealthPoints
    {
        return $this->healthPoints->getValue();
    }

    public function getPosition(): Vector2
    {
        return $this->position->getValue();
    }
}