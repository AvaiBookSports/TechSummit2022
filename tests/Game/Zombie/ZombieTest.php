<?php

declare(strict_types=1);

namespace App\Tests\Game\Zombie;

use App\Game\Zombie\Exception\ZombieCannotHaveLessThanZeroHealthPointException;
use App\Game\Zombie\Exception\ZombieCannotHaveMoreThanOneHealthPointException;
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

    /**
     * @test
     * @testdox it should return a valid health point
     */
    public function it_should_return_a_valid_health_point(): void
    {
        $zombie = new Zombie(
            new Name('First Zombie'),
            new HealthPoints(1),
            new Vector2(0, 0)
        );

        $this->assertSame(1, $zombie->getHealhPoints()->getValue());
    }

    /**
     * @test
     * @testdox it should return a less than zero health point exception
     */
    public function it_should_return_a_less_than_zero_health_point_exception(): void
    {
        $this->expectException(ZombieCannotHaveLessThanZeroHealthPointException::class);

        new Zombie(
            new Name('First Zombie'),
            new HealthPoints(-1),
            new Vector2(0, 0)
        );
    }

    /**
     * @test
     * @testdox it should return a more than one health point exception
     */
    public function it_should_return_a_more_than_one_health_point_exception(): void
    {
        $this->expectException(ZombieCannotHaveMoreThanOneHealthPointException::class);

        new Zombie(
            new Name('First Zombie'),
            new HealthPoints(2),
            new Vector2(0, 0)
        );
    }

    /**
     * @test
     * @testdox it should return it is not dead
     */
    public function it_should_return_it_is_not_dead(): void
    {
        $zombie = new Zombie(
            new Name('First Zombie'),
            new HealthPoints(1),
            new Vector2(0, 0)
        );

        $this->assertFalse($zombie->isDead());
    }

    /**
     * @test
     * @testdox it should return it is dead
     */
    public function it_should_return_it_is_dead(): void
    {
        $zombie = new Zombie(
            new Name('First Zombie'),
            new HealthPoints(0),
            new Vector2(0, 0)
        );

        $this->assertTrue($zombie->isDead());
    }
}