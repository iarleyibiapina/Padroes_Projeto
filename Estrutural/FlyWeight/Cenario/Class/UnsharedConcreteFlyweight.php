<?php

// esta classe pode manter o estado completo do objeto
class UnsharedConcreteFlyweight extends AbstractFlyweightFuria
{
    public string $estado = "X";
    public int $pontos = 0;

    public function operacao(int $pontos): mixed
    {
        $this->pontos = $pontos;
        return 1;
    }
}
