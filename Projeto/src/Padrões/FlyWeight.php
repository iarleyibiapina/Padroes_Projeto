<?php

// estrutural - cap-7

namespace Iarley\Designpattern\Padrões;


// Interface Flyweight para objetos compartilhados
interface ShapeFlyweight {
    public function draw(int $x, int $y);
}

// Implementação concreta do Flyweight para um círculo
class CircleFlyweight implements ShapeFlyweight {
    private $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    public function draw(int $x, int $y) {
        echo "Desenhando um círculo colorido de {$this->color} em ($x, $y)\n";
    }
}

// Factory para gerenciar e criar flyweights
class FlyweightFactory {
    private $flyweights = [];

    public function getCircle(string $color): CircleFlyweight {
        if (!isset($this->flyweights[$color])) {
            $this->flyweights[$color] = new CircleFlyweight($color);
        }
        return $this->flyweights[$color];
    }
}

// Cliente utilizando os flyweights
class DrawingClient {
    private $factory;

    public function __construct(FlyweightFactory $factory) {
        $this->factory = $factory;
    }

    public function drawCircle(string $color, int $x, int $y) {
        $circle = $this->factory->getCircle($color);
        $circle->draw($x, $y);
    }
}

// Exemplo de uso
$factory = new FlyweightFactory();
$client = new DrawingClient($factory);

// Desenhando círculos em diferentes coordenadas
$client->drawCircle('vermelho', 10, 10);
$client->drawCircle('azul', 20, 20);
$client->drawCircle('vermelho', 30, 30);
$client->drawCircle('azul', 40, 40);
$client->drawCircle('vermelho', 50, 50);
$client->drawCircle('azul', 60, 60);