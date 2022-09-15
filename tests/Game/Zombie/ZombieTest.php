<?php

declare(strict_types=1);

namespace App\Tests\Game\Zombie;

use App\Game\Zombie\HealthPoints;
use App\Game\Zombie\Name;
use App\Game\Zombie\Zombie;
use App\Shared\Vector2;
use PHPUnit\Framework\TestCase;

final class ZombieTest extends TestCase
{
    /**
     * @test
     * @testdox it should return a valid name
     */
    public function it_should_return_a_valid_name(): void
    {
        $zombie = new Zombie(
            new Name('First Zombie'),
            new HealthPoints(1),
            new Vector2(0, 0)
        );

        $this->assertNotEmpty($zombie->getName());
    }
}