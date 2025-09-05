<?php

// estrutural - cap-2

namespace Iarley\Designpattern\Relatorio\Implementacao;

use Iarley\Designpattern\Relatorio\ArquivoExportado;
use Iarley\Designpattern\Relatorio\ConteudoExportadoInterface;

// implementando

class ArquivoXmlExportado implements ArquivoExportado
{
    public function __construct(private string $nomeElementoPais) {
      
    }

    public function salvar(ConteudoExportadoInterface $conteudoExportadoInterface): string
    {
        $elementoXml = new \SimpleXMLElement("<{$this->nomeElementoPais}/>");
        foreach ($conteudoExportadoInterface->conteudo() as $item => $valor){
            $elementoXml->addChild($item, $valor);
        }
        $caminhoArquivo = tempnam(sys_get_temp_dir(), 'xml');
        $elementoXml->asXML($caminhoArquivo);
        return $caminhoArquivo;
    }
}
