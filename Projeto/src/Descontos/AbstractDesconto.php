<?php

namespace Iarley\Designpattern\Descontos;

use Iarley\Designpattern\Orcamento;

abstract class AbstractDesconto
{
    // se atinge desconto retorna normalmente, senao retorna uma nova instancia
    // de um novo objeto que herda de Desconto.
    // pode receber um nulo para finalizar
    public function __construct(protected ?AbstractDesconto $proximoDesconto) {
    }

    abstract public function calcula(Orcamento $orcamento): float;
}
