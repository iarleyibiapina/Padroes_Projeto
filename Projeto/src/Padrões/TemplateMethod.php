<?php

namespace Iarley\Designpattern\Padrões;
use Iarley\Designpattern\Impostos\Icpp;
use Iarley\Designpattern\Impostos\Ikcv;
use Iarley\Designpattern\Orcamento;

class TemplateMethod
{
    public function execute()
    {
        $imposto1  = new Icpp();
        $imposto2  = new Ikcv();
        $orcamento = new Orcamento(700);
        $orcamento->quantidadeItems = 7;
        echo $imposto1->calcula($orcamento) . PHP_EOL;
        echo $imposto2->calcula($orcamento) . PHP_EOL;
    }
}
