<?php

// criacional - cap-3

namespace Iarley\Designpattern\Venda\Factory;
use Iarley\Designpattern\Interface\Impostos;
use Iarley\Designpattern\Venda\Venda;

interface VendaFactoryInterface
{
    // poso ser uma venda de produto ou servico
    public function criarVenda(): Venda;
    public function imposto(): Impostos;
}
