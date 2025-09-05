<?php

// criacionais - cap-3

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Venda\Factory\VendaProdutoFactory;
use Iarley\Designpattern\Venda\Factory\VendaServicoFactory;

class AbstractFactory
{
    public function executeServico()
    {
        // cria os objetos compostos
        $fabricaVenda = new VendaServicoFactory('user');
        $venda   = $fabricaVenda->criarVenda();
        $imposto = $fabricaVenda->imposto();
        var_dump($venda, $imposto);
    }
    // 
    public function executeProduto()
    {
        // cria os objetos compostos
        $fabricaVenda = new VendaProdutoFactory(20);
        $venda   = $fabricaVenda->criarVenda();
        $imposto = $fabricaVenda->imposto();
        var_dump($venda, $imposto);
    }
}
