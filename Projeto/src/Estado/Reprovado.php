<?php

namespace Iarley\Designpattern\Estado;

use Iarley\Designpattern\Orcamento;

class Reprovado extends Estado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new \DomainException('Reprovado');
    }

    public function finaliza(Orcamento $orcamento): void
    {
        $orcamento->estadoAtual = new Finalizado();
    }
}
