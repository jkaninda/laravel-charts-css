<?php

namespace Maartenpaauw\Chart\Data\Entries\Value;

use Maartenpaauw\Chart\Declarations\DeclarationContract;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

class StartValue implements ValueContract
{
    private ValueContract $origin;

    private DeclarationContract $declaration;

    public function __construct(ValueContract $origin, float $value, float $max = 1)
    {
        $this->origin = $origin;
        $this->declaration = new StartDeclaration($value, $max);
    }

    public function raw(): float
    {
        return $this->origin->raw();
    }

    public function display(): string
    {
        return $this->origin->display();
    }

    public function declarations(): Declarations
    {
        return $this->origin
            ->declarations()
            ->add($this->declaration);
    }
}
