<?php

// criacional - cap-4

namespace Iarley\Designpattern\NotaFiscal;

// classe nota fiscal especializada em criar um produto
class NotaFiscalProdutoBuilder extends NotaFiscalBuilder
{
    public function constroi(): NotaFiscal
    {
        // aplicando certa logica de imposto para produto
        $valorNotaFiscal = $this->notaFiscal->valor();
        // faz o calculo...
        $this->notaFiscal->valorImpostos = ($valorNotaFiscal + 1) * 10;
        return $this->notaFiscal;
    }
}
