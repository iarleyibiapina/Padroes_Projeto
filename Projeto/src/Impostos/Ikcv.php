<?php

namespace Iarley\Designpattern\Impostos;
use Iarley\Designpattern\Impostos\AliquotasEspeciais\DuasAliquotas;
use Iarley\Designpattern\Orcamento;

// TEMPLATE METHODS
// cap-3
class Ikcv extends DuasAliquotas
{
    public function calculaVersao1(Orcamento $orcamento): float
    {
        if($orcamento->valor > 550 && $orcamento->quantidadeItems > 3) {
            return $orcamento->valor * 0.04;
        }
        return $orcamento->valor * 0.025;
    }

    // metodo extraido para uma nova classes
    // public function calcula(Orcamento $orcamento): float
    // {
    //     if($this->checarSeAplicaTaxaMaxima($orcamento)) {
    //         return $this->taxaMaxima($orcamento);
    //     }
    //     return $this->taxaMinima($orcamento);
        
    // }

    protected function checarSeAplicaTaxaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento->valor > 550 && $orcamento->quantidadeItems > 3;
    }

    protected function taxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.04;
    }

    protected function taxaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.025;
    }
}
