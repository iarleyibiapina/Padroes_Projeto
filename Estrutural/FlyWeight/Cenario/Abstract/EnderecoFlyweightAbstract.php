<?php

// um mesmo endereco pode ter varios clientes diferentes
abstract class EnderecoFlyweightAbstract
{
    // recebe no parametro os dados extrinseco 
    abstract public function entrega(
        string $nome,
    ): void;
}
