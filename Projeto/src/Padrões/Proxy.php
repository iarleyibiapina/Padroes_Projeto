<?php

// estrutural - cap-6 

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Composite\ItemOrcamento;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Proxy\CacheOrcamento;

class Proxy
{
    
    public function execute()
    {
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
        $orc3 = new Orcamento(0);
        $orc3->setItem($orc1);
        $orc3->setItem($orc2);
        // 
        // se forem 'chamadas' mais vezes o metodo valor de orc3
        // ele verifica se ja existe no cache.
        $proxyCache = new CacheOrcamento($orc3);
        // irei acessar o orcamento via proxy de cache
        echo $proxyCache->valor(); // teoricamente cada chamada deveria demorar 2seg.
        echo $proxyCache->valor(); 
        echo $proxyCache->valor(); 
        // mas por conta do cache, deve reduzir o tempo a metade;
    }
}
