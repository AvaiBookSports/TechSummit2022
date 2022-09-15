<?php

declare(strict_types=1);

namespace App\Tests\Game;

use App\Game\Item\BaseballBat;
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

    /**
     * @test
     * @testdox it should add weapon to the left hand
     */
    public function it_should_add_weapon_to_the_left_hand(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToLeftHand($baseballBat);

        $this->assertSame($baseballBat, $survivor->getLeftHandWeapon());
    }

    /**
     * @test
     * @testdox it should add weapon to the right hand
     */
    public function it_should_add_weapon_to_the_right_hand(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToRightHand($baseballBat);

        $this->assertSame($baseballBat, $survivor->getRightHandWeapon());
    }

    /**
     * @test
     * @testdox it should add weapon to the backpack
     */
    public function it_should_add_weapon_to_the_backpack(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToBackpack($baseballBat);

        $this->assertContains($baseballBat, $survivor->getBackpack());
    }

    /**
     * @test
     * @testdox it should drop the left hand weapon
     */
    public function it_should_drop_the_left_hand_weapon(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToLeftHand($baseballBat);

        $survivor->dropWeaponFromLeftHand();

        $this->assertNull($survivor->getLeftHandWeapon());
    }

    /**
     * @test
     * @testdox it should drop the right hand weapon
     */
    public function it_should_drop_the_right_hand_weapon(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToRightHand($baseballBat);

        $survivor->dropWeaponFromRightHand();

        $this->assertNull($survivor->getRightHandWeapon());
    }

    /**
     * @test
     * @testdox it should get the weapon from the backpack
     */
    public function it_should_get_the_weapon_from_the_backpack(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToBackpack($baseballBat);

        $this->assertSame($baseballBat, $survivor->getWeaponFromBackpack(BaseballBat::getName()));
    }

    /**
     * @test
     * @testdox it should drop the weapon from the backpack
     */
    public function it_should_drop_the_weapon_from_the_backpack(): void
    {
        $survivor = new Survivor(
            'Álvaro',
            new HealthPoints(3),
            new Experiencie(5),
            new Vector2(1, 5)
        );

        $baseballBat = BaseballBat::createInSurvivor();
        $survivor->addWeaponToBackpack($baseballBat);

        $survivor->dropWeaponFromBackpack(BaseballBat::getName());

        $this->assertNull($survivor->getWeaponFromBackpack(BaseballBat::getName()));
    }
}
