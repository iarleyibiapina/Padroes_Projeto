<?php

// estruturais - cap-3

namespace Iarley\Designpattern\Impostos\Decorator;

use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Impostos\Decorator\ImpostoDecorator;

class Iss extends ImpostoDecorator
{
    public function calcula(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.2;
    }

    public function realizaCalculoEspecifico(Orcamento $orcamento): float
    {
        return $this->calcula($orcamento);
    }
}
