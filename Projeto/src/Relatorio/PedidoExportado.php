<?php

// estruturais - cap-2

namespace Iarley\Designpattern\Relatorio;

use Iarley\Designpattern\Pedido\Pedido;

class PedidoExportado implements ConteudoExportadoInterface
{
    public function __construct(private Pedido $pedido) {     
    }

    public function conteudo(): array 
    {
        return [
            'orcamento'    => $this->pedido->orcamento,
            'nome_cliente' => $this->pedido->nomeCliente,
        ];
    }
}
