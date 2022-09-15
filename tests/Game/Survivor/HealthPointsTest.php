<?php

declare(strict_types=1);

namespace App\Tests\Game\Survivor;

use App\Game\Survivor\HealthPoints;
use PHPUnit\Framework\TestCase;

class HealthPointsTest extends TestCase
{
    /**
     * @test
     * @testdox it should create a valid healthpoints class
     */
    public function it_should_create_a_valid_healthpoints_class(): void
    {
        $healthpoints = new HealthPoints(0);
        $this->assertSame(0, $healthpoints->value);

        $healthpoints = new HealthPoints(1);
        $this->assertSame(1, $healthpoints->value);

        $healthpoints = new HealthPoints(8);
        $this->assertSame(8, $healthpoints->value);
    }

    /**
     * @test
     * @testdox it should not allow negative healthpoints
     */
    public function it_should_not_allow_negative_healthpoints(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Health cannot be lower than 0');
        $healthpoints = new HealthPoints(-1);
        $this->assertSame(-1, $healthpoints->value);
    }
}
