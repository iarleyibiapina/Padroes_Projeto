<?php

// estrutural - cap-6

namespace Iarley\Designpattern\Proxy;
use Iarley\Designpattern\Composite\Interface\Orcavel;

// necessita ser uma copia exata da classe alvo, ou a que esta
// substituindo
class CacheOrcamento implements Orcavel
{
    private float $cache = 0;
    
    public function __construct(private Orcavel $orcamento) {}
    
    public function valor(): float
    {
        // agora demora a mesma quantidade de segundos, se tiver varias requisiçoes
        // mas ainda assim, a performance é melhor
        // se a quantidade de requisicoes for grande, usar um cache mais robusto
        // como memcached ou redis
        // este exemplo simplesmente reutiliza o valor calculado anteriormente
        if($this->cache == 0) $this->cache = $this->orcamento->valor();
        return $this->cache;
    }

    public function setproxyCacheItem(Orcavel $item): never
    {   
        throw new \Exception('nao é possivel adicionar em orcamento cacheado');
    }
}
