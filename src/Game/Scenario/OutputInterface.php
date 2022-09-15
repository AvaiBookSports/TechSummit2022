<?php
declare(strict_types=1);

namespace App\Game\Scenario;

interface OutputInterface
{
    public function write(string $output): void;
}