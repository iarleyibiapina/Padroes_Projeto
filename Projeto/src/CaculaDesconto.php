<?php

namespace Iarley\Designpattern;

use Iarley\Designpattern\Descontos\Desconto500Reais;
use Iarley\Designpattern\Descontos\Desconto5Items;
use Iarley\Designpattern\Descontos\FimDesconto;
use Iarley\Designpattern\Log\Desconto;

// CHAIN OF RESPONSIBILITIES

class CaculaDesconto
{
    // aqui surge o mesmo problema de crescimento vertical
    // o padrao strategy poderia ser aplicado, porem a regra de negocio e a quantidade
    // excessiva de ifs ainda permaneceria. Ou seja a strategy apenas removeria os ifs 
    // para uma outra classe.
    public function primeiraVersao(Orcamento $orcamento): float
    {
        // 1
        // aplica 10% se tiver 5 itens
        if($orcamento->quantidadeItems > 4) return $orcamento->valor * 0.1;
        // surgiu uma nova regra... novo if
        if($orcamento->valor > 500) return $orcamento->valor * 0.05;
        return 0;
    }

    public function segundaVersao(Orcamento $orcamento): float
    {
        // 2
        // desconsiderar o fim desconto, pois foi imlementado para a versao final
        $desconto5itens = new Desconto5Items(new FimDesconto());
        $desconto = $desconto5itens->calcula($orcamento);

        if($desconto === 0) {
            // desconsiderar o fim desconto, pois foi imlementado para a versao final
            $desconto500reais = new Desconto500Reais(new FimDesconto());
            $desconto = $desconto500reais->calcula($orcamento);
        }
        // novos descontos... novas clases...
        return $desconto;
    }   
    
    // por fim o padrao final se torna essa 'cadeia' de objetos aninhados
    public function calcula(Orcamento $orcamento): float
    {
        // 3
        // aplicando o padrao, com uma cadeia de descontos
        // como a classe sempre espera um proximo desconto, uma forma de driblar é 
        // passar uma casca vazia de desconto.
        $cadeiaDesconto = new Desconto5Items(
            new Desconto500Reais(
                new FimDesconto()
            )
        );
        return $cadeiaDesconto->calcula($orcamento);
    }

    // estrutural - cap-5 - "aplicando" uma FACADE
    static public function calcular(Orcamento $orcamento): float
    {
        // facade é so uma forma de reunir um codigo complexo de uma lib ou varias delas
        // em um unico lugar por meio de uma interface simples.
        $cadeiaDesconto = new Desconto5Items(
            new Desconto500Reais(
                new FimDesconto()
            )
        );
        $descontoCalculado = $cadeiaDesconto->calcula($orcamento);
        // estruturais - cap-5
        // implementando mais um log
        $log = new Desconto();
        $log->informar($descontoCalculado);
        return $descontoCalculado;
    }
    // chama via CalculaDesconto::calcular();
}