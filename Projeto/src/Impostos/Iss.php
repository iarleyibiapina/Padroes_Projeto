<?php

namespace Iarley\Designpattern\Impostos;

use Iarley\Designpattern\Interface\Impostos;
use Iarley\Designpattern\Orcamento;

// Classe estrategia
class Iss implements Impostos
{
    public function calcula(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.2;
    }
}
