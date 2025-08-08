<?php

// precisa ser abstrato por conta dos metodos extrinseco (pode variar)
abstract class AbstractFlyweightFuria
{
    // recebe o estado extrinseco
    abstract public function operacao(int $pontos): mixed;    
}
