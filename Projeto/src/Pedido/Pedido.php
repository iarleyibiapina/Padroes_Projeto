<?php

namespace Iarley\Designpattern\Pedido;

use Iarley\Designpattern\Orcamento;

class Pedido 
{
    public string $nomeCliente;
    public \DateTimeImmutable $dataFinalizacao;
    public Orcamento $orcamento;
}
