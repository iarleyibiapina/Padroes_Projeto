<?php

namespace Iarley\Designpattern\Relatorio;

// estrutural - cap-2
interface ArquivoExportado
{
    // retorna caminho
    public function salvar(ConteudoExportadoInterface $conteudoExportadoInterface):string;
}
