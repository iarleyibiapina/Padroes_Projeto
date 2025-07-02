<?php

require_once __DIR__ . '/../../Implementacao/ImplementacaoRaiz.php';

class ImplementaGrande extends ImplementacaoRaiz
{
    public string $tamanho = "grande";
    public function getTamanho(): string
    {
        return $this->tamanho;
    }
}
