<?php

declare(strict_types=1);

namespace App\Game\Survivor;

use App\Shared\Vector2;

/**
 * tienen un nombre único
* tienen un valor inicial de vida
* tienen un valor inicial de experiencia
* pueden llevar con ellos hasta 5 elementos de equipación, uno en cada mano y el resto en la
* mochila
* se encuentran siempre en alguna coordenada del mapa
 */
final class Survivor
{
    public function __construct(
        private readonly string $name,
        private readonly HealthPoints $healthPoints,
        private readonly Experiencie $experiencie,
        private readonly Vector2 $position,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealthPoints(): HealthPoints
    {
        return $this->healthPoints;
    }

    public function getExperiencie(): Experiencie
    {
        return $this->experiencie;
    }

    public function getPosition(): Vector2
    {
        return $this->position;
    }
}