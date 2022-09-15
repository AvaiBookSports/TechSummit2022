<?php

namespace App\Tests\Game\Item;

use App\Game\Item\AbstractPlaceableWeapon;
use App\Game\Item\BaseballBat;
use App\Game\Item\Exception\WeaponIsNotUsableException;
use App\Shared\Vector2;
use PHPUnit\Framework\TestCase;

class AbstractPlaceableWeaponTest extends TestCase
{
    /** 
     * @test
     * @testdox it cannot use a weapon if it in map
     */
    public function it_cannot_use_a_weapon_if_it_in_map(): void
    {
        $weapon = BaseballBat::createInMap(new Vector2(0,0));

        $this->expectException(WeaponIsNotUsableException::class);

        $weapon->use();
    }
}
