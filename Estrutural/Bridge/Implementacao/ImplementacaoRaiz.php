<?php

// EM UM CONTEXTO/CENARIO, havera apenas duas abastratas: 
//      uma para 'Abstracao' e uma para 'Implementacao'
// outro contexto requer a mesma estrutura, ou que a abstracao e implementacao
// sejam extremamente construidas

// Somente essa
abstract class ImplementacaoRaiz
{
    public function implementacaoRaiz()
    {
        return "Implementacao Raiz - metodo global";
    }
    abstract public function getTamanho(): string;
}
