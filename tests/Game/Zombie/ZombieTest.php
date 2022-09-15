<?php

declare(strict_types=1);

namespace App\Tests\Game\Zombie;

use App\Game\Zombie\HealthPoints;
use App\Game\Zombie\Name;
use App\Game\Zombie\Zombie;

final class ZombieTest
{
    /**
     * @test
     * @testdox it should return a valid name
     */
    public function it_should_return_a_valid_name(): void
    {
        $zombie = new Zombie(
            new Name('First Zombie'),
            new HealthPoints(1)
        );
    }
}