<?php

abstract class AbstractPromocao implements DescontoInterface
{
    public function desconto(int $valor): int
    {
        return $valor;
    }
}
