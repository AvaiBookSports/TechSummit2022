<?php

declare(strict_types=1);

namespace App\Tests\Game;

use App\Game\Survivor\Experiencie;
use App\Game\Survivor\HealthPoints;
use App\Game\Survivor\Survivor;
use App\Shared\Vector2;
use PHPUnit\Framework\TestCase;

class SurvivorTest extends TestCase
{
    /**
     * @test
     * @testdox it should create a survivor
     */
    public function it_should_create_a_survivor(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $this->assertSame('Álvaro', $survivor->getName());
        $this->assertSame(3, $survivor->getHealthPoints()->value);
        $this->assertSame(5, $survivor->getExperiencie()->value);
        $this->assertSame(1, $survivor->getPosition()->x);
        $this->assertSame(5, $survivor->getPosition()->y);
    }
}
