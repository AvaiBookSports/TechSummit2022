<?php

declare(strict_types=1);

namespace App\Game\Scenario;

use App\Game\Zombie\Name;
use App\Game\Zombie\Zombie;
use App\Game\Survivor\Survivor;
use Doctrine\Common\Collections\ArrayCollection;
use Game\Item\SurvivorWeaponInterface;
use RuntimeException;

final class Scenario
{
    const MOVE_UP = 0;

    const MOVE_RIGHT = 1;

    const MOVE_DOWN = 2;

    const MOVE_LEFT = 3;

    /** @var ArrayCollection<Survivor> $survivors */
    private ArrayCollection $survivors;

    /** @var ArrayCollection<Zombie> $zombies */
    private ArrayCollection $zombies;

    /** @var ArrayCollection<SurvivorWeaponInterface> $items */
    private ArrayCollection $items;

    /**
     * @param int $size
     */
    public function __construct(
        private int $size,
        private OutputInterface $output
    ) {
        if (3 > $this->size) {
            throw new RuntimeException('Scenario size too low');
        }

        $this->survivors = new ArrayCollection();
        $this->zombies = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return ArrayCollection<Survivor>
     */
    public function getSurvivors(): ArrayCollection
    {
        return $this->survivors;
    }

    /**
     * @return ArrayCollection<Zombie>
     */
    public function getZombies(): ArrayCollection
    {
        return $this->zombies;
    }

    /**
     * @return ArrayCollection<SurvivorWeaponInterface>
     */
    public function getItems(): ArrayCollection
    {
        return $this->items;
    }

    /**
     * @param Survivor $survivor
     * @return Scenario
     */
    public function addSurvivor(Survivor $survivor): self
    {
        if ($this->survivors->containsKey($survivor->getName())) {
            throw new RuntimeException('Survivor already exists with this name');
        }

        $this->survivors->set($survivor->getName(), $survivor);

        return $this;
    }

    /**
     * @param Zombie $zombie
     * @return Scenario
     */
    public function addZombie(Zombie $zombie): self
    {
        if ($this->zombies->containsKey($zombie->getName()->getValue())) {
            throw new RuntimeException('Zombie already exists with this name');
        }

        $this->zombies->set($zombie->getName()->getValue(), $zombie);

        return $this;
    }

    /**
     * @param SurvivorWeaponInterface $item
     * @return Scenario
     */
    public function addItem(SurvivorWeaponInterface $item): self
    {
        $this->items->add($item);

        return $this;
    }

    public function moveZombie(Name $name, int $direction): void
    {
        $this->output->write('');
    }
}