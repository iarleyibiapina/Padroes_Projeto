<?php

class SharedConcreteFlyweight extends AbstractFlyweightFuria
{
    public string $estado = "X";
    public int $pontos = 0;

    public function operacao(int $pontos): mixed
    {
        $this->pontos = $pontos;
        return 1;
    }
}
