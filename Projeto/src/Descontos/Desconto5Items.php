<?php

namespace Iarley\Designpattern\Descontos;
use Iarley\Designpattern\Orcamento;

class Desconto5Items extends AbstractDesconto
{
    public function calcula(Orcamento $orcamento): float
    {
        // aplica 10% se tiver 5 itens
        return $orcamento->quantidadeItems > 4 ? 
            $orcamento->valor * 0.1 : 
            $this->proximoDesconto->calcula($orcamento);
    }
}
