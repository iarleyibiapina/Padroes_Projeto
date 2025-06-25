<?php

//=============================
// esse bloco inteiro pode ser referentes a:
class MotorFord implements MotorInterface
{
// Um motor da Ford
}
class PneuFord implements PneuInterface
{
// Um pneu da ford
}
class GasolinaFord implements GasolinaInterface
{
// Uma gasolina da ford
}
//=============================
// assim teria outro conjunto de 3 classes para as outras fabricas.


class FordFactory extends VeiculoAbstratoFactory
{
    public function criarMotor(): MotorInterface
    {
        return new MotorFord();
    }
    public function criarPneu(): PneuInterface
    {
        return new PneuFord();
    }
    public function criarGasolina(): GasolinaInterface
    {
        return new GasolinaFord();
    }
}
