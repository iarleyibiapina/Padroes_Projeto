<?php

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Orcamento;

class State
{
    public function executeUm()
    {
        echo "Orcamento em um x estado" . PHP_EOL;
        $orcamento = new Orcamento(1000);
        var_dump($orcamento->estadoAtual); // esperado, em_aprovacao
        $orcamento->reprova(); // reprovar este orcamento
        var_dump($orcamento->estadoAtual); // esperado, reprovado
        // esperado, uma eexcecao
        $orcamento->reprova(); // reprovar este orcamento
        echo "Reprovar este orcamento ja em estado de reprovado" . PHP_EOL;
        var_dump($orcamento->estadoAtual); // esperado, exceçao
    }

    public function executeDois()
    {
        echo "Outro orcamento em um y estado" . PHP_EOL;
        $orcamento = new Orcamento(1200);
        var_dump($orcamento->estadoAtual); // esperado, em_aprovacao
        $orcamento->aprova(); // aprovar este orcamento
        var_dump($orcamento->estadoAtual); // esperado, reprovado
        // esperado, uma eexcecao
        echo "Valor antes de desconto em y estado" . PHP_EOL;
        var_dump($orcamento->valor); // 
        $orcamento->aplicaDescontoExtra(); // faz calculo com base estado
        echo "Desconto apos y estado" . PHP_EOL;
        var_dump($orcamento->valor); // 
    }
}