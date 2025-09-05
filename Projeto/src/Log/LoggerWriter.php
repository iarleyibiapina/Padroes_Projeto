<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Log;

interface LoggerWriter
{
    public function escreve(string $mensagem): void;
}

