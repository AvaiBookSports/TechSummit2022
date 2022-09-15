<?php

declare(strict_types=1);

namespace App\Game\Item;

class BaseballBat extends AbstractPlaceableWeapon
{
    public function getName(): string
    {
        return 'Baseball Bat';
    }

    public function getRange(): int
    {
        return 0;
    }

    public function getDamage(): int
    {
        return 1;
    }

    public function getUses(): int
    {
        return 1;
    }
}