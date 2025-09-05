<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Log;

class FileLogWriter implements LoggerWriter
{
    private $arquivo;

    public function __construct(string $caminhoArquivo) {
        $this->arquivo = fopen($caminhoArquivo, 'a+');
        // este modo a+ sempre adiciona ao final do arquivo ou cria se nao existir
    }
    
    public function escreve(string $mensagem): void
    {
        fwrite($this->arquivo,$mensagem);
    }

    public function __destruct()
    {
        fclose($this->arquivo);
    }
}