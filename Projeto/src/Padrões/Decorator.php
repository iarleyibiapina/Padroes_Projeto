<?php

// estruturais - cap-3

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\CalculaImpostoDecorator;
use Iarley\Designpattern\Impostos\Decorator\Icms;
use Iarley\Designpattern\Impostos\Decorator\Iss;
use Iarley\Designpattern\Orcamento;

class Decorator
{
    public function executa()
    {
        $cal = new CalculaImpostoDecorator();
        $orc = new Orcamento(200);

        // ACUMULANDO IMPOSTOS
        // padrao consiste em adicionar um compotamentoo a uma classe

        // a forma implementada aqui, é um decorator decorando outro
        echo $cal->calcula($orc, new Iss(new Icms()));
    }
}
