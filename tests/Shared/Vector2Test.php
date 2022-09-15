<?php

declare(strict_types=1);

namespace App\Tests\Shared;

use App\Shared\Vector2;
use PHPUnit\Framework\TestCase;

class Vector2Test extends TestCase
{
    /**
     * @test
     * @testdox create a valid vector2
     */
    final public function create_a_valid_vector_2(): void
    {
        $position = new Vector2(0, 0);
        $this->assertSame(0,  $position->x);
        $this->assertSame(0,  $position->y);

        $position = new Vector2(1, 7);
        $this->assertSame(1,  $position->x);
        $this->assertSame(7,  $position->y);
    }

    /**
     * @test
     * @testdox don't allow negative X values
     */
    public function don_t_allow_negative_x_values(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('X axis cannot be lower than 0');
        $position = new Vector2(-1, 0);
    }
}
