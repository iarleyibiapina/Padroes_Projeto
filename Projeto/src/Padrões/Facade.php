<?php

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\CaculaDesconto;
use Iarley\Designpattern\Orcamento;

class Facade
{
    public function execute()
    {
        $orc = new Orcamento(200);
        $orc->quantidadeItems = 20;
        // usando a facade, de um objeto com logica complexa e varias libs
        // neste unico metodo;
        return CaculaDesconto::calcular($orc);
    }
}
