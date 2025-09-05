<?php

namespace Iarley\Designpattern\Impostos;
use Iarley\Designpattern\Impostos\AliquotasEspeciais\DuasAliquotas;
use Iarley\Designpattern\Orcamento;

// TEMPLATE METHODS
// cap-3
class Icpp extends DuasAliquotas
{
    public function calculaVersaoUm(Orcamento $orcamento): float
    {
        if($orcamento->valor > 550) return $orcamento->valor * 0.03;
        return $orcamento->valor * 0.02;
    }

    // modifica apenas suas regras especificas
    protected function checarSeAplicaTaxaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento->valor > 550;
    }

    protected function taxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.03;
    }

    protected function taxaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }
}
