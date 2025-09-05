<?php

// estrutural - cap-3

namespace Iarley\Designpattern;
use Iarley\Designpattern\Impostos\Decorator\ImpostoDecorator;

class CalculaImpostoDecorator
{
    public function calcula(Orcamento $orcamento, ImpostoDecorator $impostos): float 
    {
        return $impostos->calculaImposto($orcamento);
    }
}
