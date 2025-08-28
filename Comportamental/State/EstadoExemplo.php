<?php 

abstract class EstadoExemplo
{
    protected Veiculo $veiculo;

    public function setVeiculo(Veiculo $veiculo): void
    {
        $this->veiculo = $veiculo;
    }

    // estados/ações possiveis 
    abstract public function acelerar(): void;
    abstract public function desligar(): void;
    abstract public function ligar(): void;
}