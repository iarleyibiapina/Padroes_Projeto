<?php

require 'VeiculoInterface.php';
require 'VeiculoAbstratoFactory.php';
require 'FordFactory.php';

// $familia = (new FordFactory())->montarVeiculo();
// die(var_dump($familia));

// outro exemplo, tendo como escolher a fabrica

class Montador
{
    public function montarVeiculo(VeiculoAbstratoFactory $fabrica): array
    {
        $motor    = $fabrica->criarMotor();
        $gasolina = $fabrica->criarGasolina();
        $pneu     = $fabrica->criarPneu();
        return [$motor, $gasolina, $pneu];
        // ou $fabrica->montarVeiculo(); // direto, implementacao personalizada
    }
}

$montador = new Montador();

// defindo a fabrica
$fabricaFord = new FordFactory();
var_dump($montador->montarVeiculo($fabricaFord));

// podendo ter outras fabricas...
// $fabricaVW = new VWFactory();
// $montador->montarVeiculo($fabricaVW);

