<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Log\Factory;

use Iarley\Designpattern\Log\LoggerWriter;
use Iarley\Designpattern\Log\LogManager;
use Iarley\Designpattern\Log\StdOutLogWriter;

// logManager que cria, fabrica um stdout
class StdOutLogManager extends LogManager
{
    public function criarLogWritter(): LoggerWriter
    {
        return new StdOutLogWriter();
    }   
}
