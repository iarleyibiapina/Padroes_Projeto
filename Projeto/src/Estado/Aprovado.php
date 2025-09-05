<?php

namespace Iarley\Designpattern\Estado;

use Iarley\Designpattern\Orcamento;

class Aprovado extends Estado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.05;
    }

    public function finaliza(Orcamento $orcamento): void
    {
        $orcamento->estadoAtual = new Finalizado();
    }
}
