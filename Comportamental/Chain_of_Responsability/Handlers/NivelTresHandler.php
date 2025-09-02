<?php

class NivelTresHandler extends Handler
{
    public function handle(Casca $casca)
    {
        if($casca->nivel === 10){
            echo "NivelTresHandler: Tratou a casca de nível 10.\n";
            return true;
        }
        echo "Não tratou - Tres - Passando para o proximo handler...\n";
        return parent::handle($casca);
    }
}
