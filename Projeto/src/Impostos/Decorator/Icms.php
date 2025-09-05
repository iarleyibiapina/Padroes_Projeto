<?php

// estruturais - cap-3

namespace Iarley\Designpattern\Impostos\Decorator;

use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Impostos\Decorator\ImpostoDecorator;

class Icms extends ImpostoDecorator
{
    public function calcula(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.1;
    }

    public function realizaCalculoEspecifico(Orcamento $orcamento): float
    {
        return $this->calcula($orcamento);
    }
}
