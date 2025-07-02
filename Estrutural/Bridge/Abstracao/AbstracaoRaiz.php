<?php

require_once __DIR__ . '/../Implementacao/ImplementacaoRaiz.php';

// EM UM CONTEXTO/CENARIO, havera apenas duas abastratas: 
//      uma para 'Abstracao' e uma para 'Implementacao'
// outro contexto requer a mesma estrutura, ou que a abstracao e implementacao
// sejam extremamente construidas

abstract class AbstracaoRaiz
{
    public function __construct(protected ImplementacaoRaiz $implementacao) {}
    public function setImplementacao(ImplementacaoRaiz $implementacao): void
    {
        $this->implementacao = $implementacao;
    }
    public function implementacao(): ImplementacaoRaiz
    {
        return $this->implementacao;
    }
    public function abstracaoRaiz(): string
    {
        return "Abstracao Raiz  - metodo global";
    }
}