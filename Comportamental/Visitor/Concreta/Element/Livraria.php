<?php

class Livraria implements Element
{
    public function __construct(public string $nome, public int $livrosVendidos) {}

    // A livraria diz ao visitante: "Ei, eu sou uma Livraria, execute sua lógica para livrarias em mim".
    public function accept(Visitor $visitor): void
    {
        $visitor->visitLivraria($this);
    }
}