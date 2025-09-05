<?php

// estruturais - cap-3

namespace Iarley\Designpattern\Impostos\Decorator;

use Iarley\Designpattern\Orcamento;

// adicionando impostos
abstract class ImpostoDecorator
{
    public function __construct(protected ?ImpostoDecorator $outroImposto = null) {
    }
    abstract protected function realizaCalculoEspecifico(Orcamento $orcamento): float;

    public function calculaImposto(Orcamento $orcamento)
    {
        // incrementando comportamentos
        return $this->realizaCalculoEspecifico($orcamento) + 
            $this->realizaCalculoDeOutroImposto($orcamento);
    }

    private function realizaCalculoDeOutroImposto(Orcamento $orcamento)
    {
        return $this->outroImposto === null ? 0 : $this->outroImposto->calculaImposto($orcamento);
    }
}
