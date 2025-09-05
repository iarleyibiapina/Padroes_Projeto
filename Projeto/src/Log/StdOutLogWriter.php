<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Log;

class StdOutLogWriter implements LoggerWriter
{
    public function escreve(string $mensagem): void
    {
        echo "Log " . $mensagem;
        // ou
        // fwrite(STDOUT, $mensagem);
    }
}