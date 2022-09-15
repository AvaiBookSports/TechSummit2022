<?php

declare(strict_types=1);

namespace App\Tests\Game\Scenario;

use App\Game\Scenario\Scenario;
use App\Game\Survivor\Experiencie;
use App\Game\Survivor\HealthPoints;
use App\Game\Survivor\Survivor;
use App\Shared\Vector2;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

final class ScenarioTest extends TestCase
{
    /**
     * @test
     * @testdox it should return scenario too low exception
     */
    public function it_should_return_scenario_too_low_exception(): void
    {
        $this->expectException(\RuntimeException::class);

        new Scenario(2);
    }

    /**
     * @test
     * @testdox it should add survivor
     */
    public function it_should_add_survivor(): void
    {
        $scenario = new Scenario(5);

        $survivor = new Survivor(
            'Survivor 1',
            new HealthPoints(5),
            new Experiencie(0),
            new Vector2(0, 0)
        );

        $scenario->addSurvivor($survivor);

        $arrayCollection = new ArrayCollection();
        $arrayCollection->add($survivor);

        $this->assertEquals($arrayCollection, $scenario->getSurvivors());
    }
}