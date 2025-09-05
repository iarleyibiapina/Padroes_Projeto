<?php

namespace Iarley\Designpattern\Descontos;

use Iarley\Designpattern\Orcamento;

class FimDesconto extends AbstractDesconto
{
    // para de fato finalizar, sobrescreve o construtor e passa nulo

    public function __construct() {
        parent::__construct(null);
    }
    
    public function calcula(Orcamento $orcamento): float
    {
        return 0;
    }
}
