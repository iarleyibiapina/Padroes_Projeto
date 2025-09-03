<?php

class Cafeteria implements Element
{
    public function __construct(public string $nome, public float $vendasDeCafe) {}

    // Magica do "double dispatch"
    // Elemento chama o visitante e o visitante executa a sua logica para esta cafeteria
    public function accept(Visitor $visitor): void
    {
        $visitor->visitCafeteria($this);
    }
}
