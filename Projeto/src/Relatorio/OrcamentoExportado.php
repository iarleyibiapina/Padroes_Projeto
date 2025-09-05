<?php

// estruturais - cap-2

namespace Iarley\Designpattern\Relatorio;

use Iarley\Designpattern\Orcamento;

class OrcamentoExportado implements ConteudoExportadoInterface
{
    public function __construct(private Orcamento $orcamento) {     
    }

    public function conteudo(): array 
    {
        return [
            'valor' => $this->orcamento->valor,
            'itens' => $this->orcamento->quantidadeItems,
        ];
    }
}
