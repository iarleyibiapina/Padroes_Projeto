<?php

class Acelerar extends EstadoExemplo
{
    public function acelerar(): void
    {
        echo "acelerando mais ainda o veiculo...\n";
    }

    public function desligar(): void
    {
        echo "desacelerando o veiculo e desligando\n";
        $this->veiculo->novoEstado(estadoExemplo: new Desligar());
    }

    public function ligar(): void
    {
        echo "veiculo ja esta ligado e acelerando\n";
    }
}
