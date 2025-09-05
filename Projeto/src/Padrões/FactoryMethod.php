<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Padrões;
use Iarley\Designpattern\Log\Factory\FileLogManager;
use Iarley\Designpattern\Log\Factory\StdOutLogManager;

class FactoryMethod
{
    public function executeStd()
    {
        $logManager = new StdOutLogManager();
        $logManager->log('info', 'testando log manager');
    }


    public function executeFile()
    {
        $logManager = new FileLogManager(__DIR__ . "/../log/test.log");
        $logManager->log('info', 'testando file manager');
    }

}
