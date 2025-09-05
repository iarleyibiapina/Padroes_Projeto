<?php

namespace Iarley\Designpattern\AcoesGerarPedido;

use SplObserver;
use SplSubject;

// interface para facil chamada no 'observer'
class EnviarPedidoPorEmailObserver implements SplObserver
{
    public function update(SplSubject $pedido): void
    {
        // echo $pedido->pedido->nomeCliente;
        echo "salva no banco";
    }
}
