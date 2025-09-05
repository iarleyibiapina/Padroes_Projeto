<?php

// criacionais - cap-3

namespace Iarley\Designpattern\Venda\Factory;

use Iarley\Designpattern\Impostos\Icms;
use Iarley\Designpattern\Interface\Impostos;
use Iarley\Designpattern\Venda\Venda;
use Iarley\Designpattern\Venda\VendaProduto;

class VendaProdutoFactory implements VendaFactoryInterface
{
    public function __construct(protected int $pesoProduto) {}
    
    public function criarVenda(): Venda
    {
        return new VendaProduto(new \DateTimeImmutable('d'), $this->pesoProduto);
    }

    public function imposto(): Impostos
    {
        return new Icms();
    }
}
