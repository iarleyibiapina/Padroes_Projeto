<?php

class CupomB extends AbstractPromocao
{
    #[Override]
    public function desconto(int $valor): int
    {
        $desconto = $valor * 0.20;
        return $valor - $desconto; // 20% de desconto
    }
}
