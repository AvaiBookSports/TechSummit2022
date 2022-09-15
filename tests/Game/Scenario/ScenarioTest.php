<?php

declare(strict_types=1);

namespace App\Tests\Game\Scenario;

use App\Game\Scenario\OutputInterface;
use App\Game\Scenario\Scenario;
use App\Game\Survivor\Experiencie;
use App\Game\Survivor\HealthPoints;
use App\Game\Survivor\Survivor;
use App\Game\Zombie\Name;
use App\Game\Zombie\Zombie;
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

        new Scenario(2, $this->createMock(OutputInterface::class));
    }

    /**
     * @test
     * @testdox it should add survivor
     */
    public function it_should_add_survivor(): void
    {
        $scenario = new Scenario(5, $this->createMock(OutputInterface::class));

        $survivor = new Survivor(
            'Survivor 1',
            new HealthPoints(5),
            new Experiencie(0),
            new Vector2(0, 0)
        );

        $scenario->addSurvivor($survivor);

        $arrayCollection = new ArrayCollection();
        $arrayCollection->set($survivor->getName(), $survivor);

        $this->assertEquals($arrayCollection, $scenario->getSurvivors());
    }

    /**
     * @test
     * @testdox it should not allow to add more than one survivor with the same name
     */
    public function it_should_not_allow_to_add_more_than_one_survivor_with_the_same_name(): void
    {
        $this->expectException(\RuntimeException::class);
        $scenario = new Scenario(5, $this->createMock(OutputInterface::class));

        $survivor = new Survivor(
            'Survivor 1',
            new HealthPoints(5),
            new Experiencie(0),
            new Vector2(0, 0)
        );

        $survivor2 = new Survivor(
            'Survivor 1',
            new HealthPoints(15),
            new Experiencie(300),
            new Vector2(0, 2)
        );

        $scenario->addSurvivor($survivor);
        $scenario->addSurvivor($survivor2);
    }

    /**
     * @test
     * @testdox it should not allow to add more than one zombie with the same name
     */
    public function it_should_not_allow_to_add_more_than_one_zombie_with_the_same_name(): void
    {
        $this->expectException(\RuntimeException::class);
        $scenario = new Scenario(5, $this->createMock(OutputInterface::class));

        $zombie = new Zombie(
            new Name('Zombie 1'),
            new \App\Game\Zombie\HealthPoints(1),
            new Vector2(0, 0)
        );

        $zombie2 = new Zombie(
            new Name('Zombie 1'),
            new \App\Game\Zombie\HealthPoints(1),
            new Vector2(0, 0)
        );

        $scenario->addZombie($zombie);
        $scenario->addZombie($zombie2);
    }
}