<?php

namespace Iarley\Designpattern\AcoesGerarPedido;

use Iarley\Designpattern\Interface\InterfaceObserverCommand;
use Iarley\Designpattern\Pedido\Pedido;

// interface para facil chamada no 'observer'
class GerarLogPedido implements InterfaceObserverCommand
{
    public function executaAcao(Pedido $pedido): void
    {
        echo "salva no banco";
    }
}
