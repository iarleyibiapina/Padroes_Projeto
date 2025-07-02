<?php

require_once __DIR__ . '/../../Implementacao/ImplementacaoRaiz.php';

class ImplementaPequeno extends ImplementacaoRaiz
{
    public string $tamanho = "pequeno";
    public function getTamanho(): string
    {
        return $this->tamanho;
    }
}
