<?php

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Impostos\Icms;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\CalculaImposto;
use Iarley\Designpattern\Impostos\Iss;

class Strategy
{
    public function execute()
    {   
        $calcularImposto = new CalculaImposto();
        $orcamento = new Orcamento(1000);

        // antigo
        echo "primeiro meio " . PHP_EOL;
        echo $calcularImposto->calcula1($orcamento, 'ICMS') . PHP_EOL;

        // novo modelo:

        // MEIO 1 (chama as classes diretamente)
        // (agora pode ser escalavel, cada nova regra, apenas adiciona)
        // calculo de Icmse
        echo "meio 1" . PHP_EOL;
        echo (new Icms())->calcula($orcamento) , PHP_EOL; 
        // calculo de Icss
        echo (new Iss())->calcula($orcamento) , PHP_EOL; 

        // MEIO 2 (passa o tipo de imposto)
        echo "meio 2" . PHP_EOL;
        echo $calcularImposto->calcula2($orcamento, new Icms()) . PHP_EOL;
        echo $calcularImposto->calcula2($orcamento, new Iss()) . PHP_EOL;
    }
}
