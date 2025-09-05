<?php

namespace Iarley\Designpattern\Interface;
use Iarley\Designpattern\Pedido\Pedido;

interface InterfaceObserverCommand
{
    public function executaAcao(Pedido $pedido): void;
}
