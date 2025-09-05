<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Log\Factory;

use Iarley\Designpattern\Log\FileLogWriter;
use Iarley\Designpattern\Log\LoggerWriter;
use Iarley\Designpattern\Log\LogManager;

// logManager que cria, fabrica um stdout
class FileLogManager extends LogManager
{
    public function __construct(private string $caminhoArquivo) {}
    
    public function criarLogWritter(): LoggerWriter
    {
        return new FileLogWriter($this->caminhoArquivo);
    }   
}
