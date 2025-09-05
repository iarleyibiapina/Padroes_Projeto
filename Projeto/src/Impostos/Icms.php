<?php

namespace Iarley\Designpattern\Impostos;

use Iarley\Designpattern\Interface\Impostos;
use Iarley\Designpattern\Orcamento;

// Classe Estrategia
class Icms implements Impostos
{
    public function calcula(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.1;
    }
}
