<?php

// estrutural - cap-2

namespace Iarley\Designpattern\Relatorio\Implementacao;

use Iarley\Designpattern\Relatorio\ArquivoExportado;
use Iarley\Designpattern\Relatorio\ConteudoExportadoInterface;
use ZipArchive;

class ArquivoZipExportado implements ArquivoExportado
{

    public function __construct(private string $nomeArquivo) {
      
    }
    
    public function salvar(ConteudoExportadoInterface $conteudoExportadoInterface): string
    {
        $caminhoArquivo = tempnam(sys_get_temp_dir(), 'zip');
        $zip = new ZipArchive();
        $zip->open($caminhoArquivo);
        $zip->addFromString($this->nomeArquivo, serialize($conteudoExportadoInterface->conteudo()));
        $zip->close();
        return $caminhoArquivo;
    }
}
