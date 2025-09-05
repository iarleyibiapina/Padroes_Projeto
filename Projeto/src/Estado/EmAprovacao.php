<?php

namespace Iarley\Designpattern\Estado;
use Iarley\Designpattern\Orcamento;

class EmAprovacao extends Estado
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.05;
    }

    public function aprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Aprovado();
    }

    public function reprova(Orcamento $orcamento)
    {   
        $orcamento->estadoAtual = new Reprovado();
    }
}
