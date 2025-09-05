<?php

// criacionais - cap-3

namespace Iarley\Designpattern\Venda\Factory;

use Iarley\Designpattern\Impostos\Iss;
use Iarley\Designpattern\Interface\Impostos;
use Iarley\Designpattern\Venda\Venda;
use Iarley\Designpattern\Venda\VendaServico;

class VendaServicoFactory implements VendaFactoryInterface
{
    public function __construct(protected string $nomePrestador) {}
    
    public function criarVenda(): Venda
    {
        return new VendaServico(new \DateTimeImmutable('d'), $this->nomePrestador);
    }

    public function imposto(): Impostos
    {
        return new Iss();
    }
}
