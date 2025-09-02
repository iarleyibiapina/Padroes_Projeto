<?php

class NivelZeroHandler extends Handler
{
    public function handle(Casca $casca)
    {
        if($casca->nivel === 0){
            echo "NivelZeroHandler: Tratou a casca de nível 0.\n";
            return true;
        }
        echo "Não tratou - Zero - Passando para o proximo handler...\n";
        return parent::handle($casca);
    }
}
