<?php

class Ligar extends EstadoExemplo
{
    public function acelerar(): void
    {
        echo "acelerando o veiculo...\n";
        $this->veiculo->novoEstado(estadoExemplo: new Acelerar());
    }

    public function desligar(): void
    {
        echo "veiculo ligado, desligando o veiculo\n";
        $this->veiculo->novoEstado(estadoExemplo: new Desligar());
    }

    public function ligar(): void
    {
        echo "veiculo ja esta ligado\n";
    }
}
