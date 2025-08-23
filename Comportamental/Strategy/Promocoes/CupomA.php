<?php

class CupomA extends AbstractPromocao
{
    #[Override]
    public function desconto(int $valor): int
    {
        $desconto = $valor * 0.40; // 40% de desconto
        return $valor - $desconto;
    }
}
