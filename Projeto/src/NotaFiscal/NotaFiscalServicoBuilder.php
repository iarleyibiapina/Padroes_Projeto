<?php

// criacional - cap-4

namespace Iarley\Designpattern\NotaFiscal;

// classe nota fiscal especializada em criar um produto
class NotaFiscalServicoBuilder extends NotaFiscalBuilder
{
    public function constroi(): NotaFiscal
    {
        // aplicando certa logica de imposto para servico
        $valorNotaFiscal = $this->notaFiscal->valor();
        // faz outro calculo...
        $this->notaFiscal->valorImpostos = ($valorNotaFiscal + 2) * 5;
        return $this->notaFiscal;
    }
}
