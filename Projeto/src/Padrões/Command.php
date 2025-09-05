<?php

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Pedido\Command\GerarPedido;
use Iarley\Designpattern\Pedido\Handler\GerarPedidoHandler;

class Command
{
    public function execCli()
    {
        // replicando o comando
        $gerarPedido = new GerarPedido(200, 2, "em"); 
        (new GerarPedidoHandler())->execute($gerarPedido);
    }
}

// Outro exemplo
// Comando Interface
interface CommandInterface {
    public function execute(); // metodo gatilho para todos os comandos
}

// Receptor
class Light {
    public function turnOn() {
        echo "A luz está ligada.\n"; // possiveis metodos
    }

    public function turnOff() {
        echo "A luz está desligada.\n";
    }
}

// Comandos Concretos
class TurnOnLightCommand implements CommandInterface {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOn();
    }
}

class TurnOffLightCommand implements CommandInterface {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light; // define a classe a ser modificada
    }

    public function execute() {
        $this->light->turnOff(); // ação a ser executada por meio deste comando
    }
}

// Invocador
class RemoteControl { // recebe comandos diversos
    private $command;

    public function setCommand(CommandInterface $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute(); // executa os comandos
    }
}

// Uso do padrão Command
$light = new Light();
$turnOn = new TurnOnLightCommand($light);
$turnOff = new TurnOffLightCommand($light);

$remote = new RemoteControl();

// Ligar a luz
$remote->setCommand($turnOn); //define o command
$remote->pressButton(); // Saída: A luz está ligada. // chama o execute do comando

// Desligar a luz
$remote->setCommand($turnOff); // define o command
$remote->pressButton(); // Saída: A luz está desligada. // chama o execute do comando 

/*
Explicação do Código
Interface Command: Define um método execute() que todas as classes de comando devem implementar.
Receptor (Light): A classe Light possui métodos para ligar e desligar a luz.
Comandos Concretos:
TurnOnLightCommand: Implementa o método execute() para ligar a luz.
TurnOffLightCommand: Implementa o método execute() para desligar a luz.
Invocador (RemoteControl): A classe RemoteControl tem um método setCommand() para definir qual comando deve ser executado e um método pressButton() que chama o método execute() do comando definido.
Uso: No final do código, criamos instâncias das classes e usamos o invocador para executar os comandos de ligar e desligar a luz.
*/

