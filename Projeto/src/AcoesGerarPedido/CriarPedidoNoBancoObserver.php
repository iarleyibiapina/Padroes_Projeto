<?php

namespace Iarley\Designpattern\AcoesGerarPedido;

use SplObserver;
use SplSubject;

// classe modificada para implementar a nova lib de obser do php
class CriarPedidoNoBancoObserver implements SplObserver
{
    public function update(SplSubject $pedido): void
    {
        echo "salva no banco";
    }
}
