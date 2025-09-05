<?php

namespace Iarley\Designpattern\Padrões;
use Iarley\Designpattern\Composite\ItemOrcamento;
use Iarley\Designpattern\Orcamento;

class Composite
{
    public function execute1()
    {
        // este valor é o mesmo do item, esta aqui por conta de
        // padroes e exemplos anteriores
        $orc1  = new Orcamento(0);
        $item1 = new ItemOrcamento(1, 20);
        $item2 = new ItemOrcamento(1, 10);
        $orc1->setItem($item1);
        $orc1->setItem($item2);
        echo $orc1->valor(); // neste ponto deve retornar 300;
    }

    public function execute2()
    {
        // este valor é o mesmo do item, esta aqui por conta de
        // padroes e exemplos anteriores
        $orc1  = new Orcamento(0);
        $item1 = new ItemOrcamento(1, 20);
        $item2 = new ItemOrcamento(1, 10);
        $orc1->setItem($item1);
        $orc1->setItem($item2);
        // 
        $orc2  = new Orcamento(0);
        $item3 = new ItemOrcamento(1, 50);
        $orc2->setItem($item3);
        // 
        // possui os dois orcamentos e reune o valor de cada orcamento
        $orc3 = new Orcamento(0);
        $orc3->setItem($orc1);
        $orc3->setItem($orc2);
        echo $orc3->valor(); // esperado 80
    }
}
 