<?php

namespace Iarley\Designpattern\Padrões;
use Iarley\Designpattern\CaculaDesconto;
use Iarley\Designpattern\Orcamento;

class ChainOfResponsibility
{
    public function primeiraVersao()
    {
        $calculadora = new CaculaDesconto();
        $orcamento = new Orcamento(600);
        $orcamento->quantidadeItems = 6;
        echo $calculadora->primeiraVersao($orcamento) . PHP_EOL; 
    }

    public function segundaVersao()
    {
        $calculadora = new CaculaDesconto();
        $orcamento = new Orcamento(600);
        $orcamento->quantidadeItems = 6;
        echo $calculadora->segundaVersao($orcamento) . PHP_EOL; 
    }

    public function executa()
    {
        $calculadora = new CaculaDesconto();
        $orcamento = new Orcamento(600);
        $orcamento->quantidadeItems = 6;
        echo $calculadora->calcula($orcamento) . PHP_EOL; 
    }
}
