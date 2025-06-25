<?php

abstract class VeiculoAbstratoFactory
{
    abstract public function criarMotor(): MotorInterface;
    abstract public function criarPneu(): PneuInterface;
    abstract public function criarGasolina(): GasolinaInterface;
    public function montarVeiculo(): array
    {
        return [
            $this->criarMotor(), 
            $this->criarPneu(), 
            $this->criarGasolina()
        ];
    }
}
