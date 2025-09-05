<?php

namespace Iarley\Designpattern\Impostos\AliquotasEspeciais;
use Iarley\Designpattern\Interface\Impostos;
use Iarley\Designpattern\Orcamento;

// TEMPLATE METHODS

// uni o codigo comum usado em Ikcv e Icpp
// todas classes filhas implementam sua forma de checar e dar uma taxa minima e maxima
abstract class DuasAliquotas implements Impostos
{
    // metodo comum as classes
    public function calcula(Orcamento $orcamento): float
    {
        if($this->checarSeAplicaTaxaMaxima($orcamento)) {
            return $this->taxaMaxima($orcamento);
        }
        return $this->taxaMinima($orcamento);
    }
    // metodos que as classes especificas devem alterar
    abstract protected function checarSeAplicaTaxaMaxima(Orcamento $orcamento): bool;
    abstract protected function taxaMaxima(Orcamento $orcamento): float;
    abstract protected function taxaMinima(Orcamento $orcamento): float;
}

// Padrao onde eu monto um metodo comum a classes filhas 
// e classes filhas definem sua regra de negocio a este metodo.