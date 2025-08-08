<?php

class Rua extends EnderecoFlyweightAbstract
{
    // dados intrisecos
        // podem ser definidos aqui ou via construtor, devem ser privados
        // pois nunca devem ser alterados
    public function __construct(private string $endereco = "Rua") {      
    }

    // dados extrinsecos (mudam via metodo)
    public function entrega(string $nome): void
    {
        echo "Entrega para $nome";
        echo "\n";
        echo "no endereco $this->endereco";
        echo "\n";
    }
}
