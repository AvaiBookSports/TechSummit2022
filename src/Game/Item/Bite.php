<?php

declare(strict_types=1);

namespace App\Game\Item;

class Bite implements ZombieWeaponInterface
{
    public function getName(): string
    {
        return 'Bite';
    }

    public function getRange(): int
    {
        return 0;
    }

    public function getDamage(): int
    {
        return 1;
    }
}