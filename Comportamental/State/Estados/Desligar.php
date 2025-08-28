<?php

class Desligar extends EstadoExemplo
{
    public function acelerar(): void
    {
        echo "nao é possivel acelerar com o veiculo desligado\n";
    }

    public function desligar(): void
    {
        echo "veiculo ja esta desligado\n";
    }

    public function ligar(): void
    {
        echo "veiculo desligado, ligando o veiculo\n";
        $this->veiculo->novoEstado(estadoExemplo: new Ligar());
    }
}
