<?php

// estrutural - cap-2

namespace Iarley\Designpattern\Relatorio;

use Iarley\Designpattern\Orcamento;

class OrcamentoXml
{
    // Classe depois sera removida/inutilizada
    public function exportar(Orcamento $orcamento): string
    {
        // usando uma lib de xml simples
        $xml = new \SimpleXMLElement('<orcamento/>');
        $xml->addChild('valor', $orcamento->valor);
        $xml->addChild('itens', $orcamento->quantidadeItems);
        return $xml->asXML(); // retorna uma string
    }
}
