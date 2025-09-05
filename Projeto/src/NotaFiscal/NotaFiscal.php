<?php

// criacional - cap-4

namespace Iarley\Designpattern\NotaFiscal;

class NotaFiscal
{
    // supondo uma classe com varios atributos ou uma quantidade maior
    // ainda em outros cenarios
    public string $cnpjEmpresa;
    public string $razaoSocialEmpresa;
    public array $itens;
    public string $observacoes;
    public \DateTimeInterface $dataEmissao;
    public float $valorImpostos;

    public function valor(): float
    {
        return array_reduce($this->itens, fn($acc, $cur) => $acc + $cur, 0);
    }
}
