<?php

declare(strict_types=1);

namespace App\Tests\Game\Survivor;

use App\Game\Survivor\Experiencie;
use PHPUnit\Framework\TestCase;

class ExperiencieTest extends TestCase
{

    /**
     * @test
     * @testdox it should create a valid experience class
     */
    public function it_should_create_a_valid_experience_class(): void
    {
        $experiencie = new Experiencie(0);
        $this->assertSame(0, $experiencie->value);

        $experiencie = new Experiencie(1);
        $this->assertSame(1, $experiencie->value);

        $experiencie = new Experiencie(8);
        $this->assertSame(8, $experiencie->value);
    }

    /**
     * @test
     * @testdox it should not allow negative experience
     */
    public function it_should_not_allow_negative_experience(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Experience cannot be lower than 0');
        $experiencie = new Experiencie(-1);
        $this->assertSame(-1, $experiencie->value);
    }
}
