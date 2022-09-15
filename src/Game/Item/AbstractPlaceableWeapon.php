<?php

declare(strict_types=1);

namespace App\Game\Item;

use App\Shared\Vector2;
use App\Game\Item\Exception\WeaponIsNotUsableException;

abstract class AbstractPlaceableWeapon implements SurvivorWeaponInterface
{
    private function __construct(public ?Vector2 $vector2)
        {
        }

        public static function createInMap(Vector2 $vector2): static
        {
            return new static($vector2);
        }

        public static function createInSurvivor(): static
        {
            return new static(null);
        }

        public function use(): void
        {
            if (null === $this->vector2) {

            }

            throw new WeaponIsNotUsableException();
        }
}