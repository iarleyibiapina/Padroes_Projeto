<?php

namespace Iarley\Designpattern\Estado;

use Iarley\Designpattern\Orcamento;

class Finalizado extends Estado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new \DomainException(message: 'Finalizado');
    }
}
