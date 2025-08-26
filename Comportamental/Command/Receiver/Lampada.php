<?php

// sabe como realizar as ações necessárias para cumprir a requisição
class Lampada
{
    public int $volume = 0;

    // operacao real a ser executada
    public function on() {
        echo "A luz está ligada.\n";
    }

    public function off() {
        echo "A luz está desligada.\n";
    }
}
