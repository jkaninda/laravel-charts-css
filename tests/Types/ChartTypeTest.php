<?php

namespace Maartenpaauw\Chartscss\Tests\Types;

use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\ChartType;

abstract class ChartTypeTest extends TestCase
{
    abstract public function type(): ChartType;

    abstract public function string(): string;

    /** @test */
    public function it_should_convert_to_a_string_correctly(): void
    {
        $this->assertEquals($this->string(), $this->type()->toString());
    }
}
