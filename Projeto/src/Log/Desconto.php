<?php

namespace Iarley\Designpattern\Log;

class Desconto
{
    public function informar(float $decontoCalculado): void
    {
        // consome lib de log
        echo "salvando log. ";
        echo $decontoCalculado;
    }
}
