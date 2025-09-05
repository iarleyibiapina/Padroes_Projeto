<?php

namespace Iarley\Designpattern\AcoesGerarPedido;

use SplObserver;
use SplSubject;

// interface para facil chamada no 'observer'
class GerarLogPedidoObserver implements SplObserver
{
    public function update(SplSubject $pedido): void
    {
        echo "salva no banco";
    }
}
