<?php

require_once __DIR__ . '/EstadoExemplo.php';
require_once __DIR__ . '/Veiculo.php';
require_once __DIR__ . '/Estados/Acelerar.php';
require_once __DIR__ . '/Estados/Desligar.php';
require_once __DIR__ . '/Estados/Ligar.php';

$veiculo = new Veiculo();
// todas as tentativas para o estado desligado
echo "\n";
echo "-DESLIGADO-\n";
$veiculo->acelerar();
$veiculo->desligar();
$veiculo->ligar();
// todas as tentativas para o estado ligado
echo "\n";
echo "-LIGADO-\n";
$veiculo->ligar();
$veiculo->acelerar();
// $veiculo->desligar(); // altera de volta para desligar
// todas as tentativas para o estado acelerar
echo "\n";
echo "-ACELERANDO-\n";
$veiculo->ligar();
$veiculo->acelerar();
$veiculo->desligar();
