<?php

namespace Maartenpaauw\Chartscss\Tests\Examples\Colors;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Examples\Colors\ColorsExample5;
use Maartenpaauw\Chartscss\Tests\Examples\ExampleTest;

class ColorsExample5Test extends ExampleTest
{
    protected function chart(): Component
    {
        return new ColorsExample5();
    }
}
