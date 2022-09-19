<?php

declare(strict_types=1);

namespace App\Game\Survivor;

use App\Game\Item\SurvivorWeaponInterface;
use App\Shared\Vector2;

final class Survivor
{
    private ?SurvivorWeaponInterface $leftHandWeapon = null;

    private ?SurvivorWeaponInterface $rightHandWeapon = null;

    /**
     * @var array<SurvivorWeaponInterface>
     */
    private array $backpack = [];

    public function __construct(
        private readonly string $name,
        private readonly HealthPoints $healthPoints,
        private readonly Experiencie $experiencie,
        private readonly Vector2 $position,
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealthPoints(): HealthPoints
    {
        return $this->healthPoints;
    }

    public function getExperiencie(): Experiencie
    {
        return $this->experiencie;
    }

    public function getPosition(): Vector2
    {
        return $this->position;
    }

    public function addWeaponToLeftHand(SurvivorWeaponInterface $weapon)
    {
        $this->leftHandWeapon = $weapon;
    }

    public function addWeaponToRightHand(SurvivorWeaponInterface $weapon)
    {
        $this->rightHandWeapon = $weapon;
    }

    public function addWeaponToBackpack(SurvivorWeaponInterface $weapon)
    {
        $this->backpack[] = $weapon;
    }

    public function getLeftHandWeapon(): ?SurvivorWeaponInterface
    {
        return $this->leftHandWeapon;
    }

    public function getRightHandWeapon(): ?SurvivorWeaponInterface
    {
        return $this->rightHandWeapon;
    }

    /**
     * @return array<SurvivorWeaponInterface>
     */
    public function getBackpack(): array
    {
        return $this->backpack;
    }

    public function dropWeaponFromLeftHand(): void
    {
        $this->leftHandWeapon = null;
    }

    public function dropWeaponFromRightHand(): void
    {
        $this->rightHandWeapon = null;
    }
}