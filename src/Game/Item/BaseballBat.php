<?php

declare(strict_types=1);

namespace App\Game\Item;

use App\Game\Item\Exception\WeaponIsNotUsableException;
use App\Shared\Vector2;

class BaseballBat extends AbstractPlaceableWeapon implements ExpendableWeaponInterface
{
    public Uses $uses;

    private function __construct(public ?Vector2 $vector2)
    {
         $this->uses = new Uses(1);
    }

    public static function createInMap(Vector2 $vector2): static
    {
        return new static($vector2);
    }

    public static function createInSurvivor(): static
    {
        return new static(null);
    }

    public static function getName(): string
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

    public function use(): void
    {
        if (null !== $this->vector2 || !$this->isWasted()) {
            throw new WeaponIsNotUsableException();
        }

        $this->spendUse();
    }

    private function isWasted(): bool
    {
        return $this->uses->uses <= 0;
    }

    private function spendUse():void
    {
        $this->uses = new Uses(($this->uses->uses)-1);
    }
}
