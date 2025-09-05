<?php

// estrutural - cap-2

namespace Iarley\Designpattern\Relatorio;

use Iarley\Designpattern\Orcamento;
use ZipArchive;

class OrcamentoZip
{
    // Classe depois sera removida/inutilizada
    public function exportar(Orcamento $orcamento)
    {
        // pegando o caminho do arquivo
        // sys_get_temp_dir(); diretorio temporario do arquivo
        // DIRECTORY_SEPARATOR separador do sistema operacional
        $caminhoArquivo = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'orcamento.zip';
        // criando zip
        $zip = new ZipArchive();
        $zip->open($caminhoArquivo, $zip::CREATE); // se nao houver cria
        // adicionar ao zip outro coonteudo com orcamento
        // serialize é um metodoo especial do php, que converte para uma string 
        // de dificil leitura mas facil entendimento para o programa.
        $zip->addFromString('orcamentoo.serial', serialize($orcamento));
        $zip->close();
    }
}
