<?php

class NivelDoisHandler extends Handler
{
    public function handle(Casca $casca)
    {
        if($casca->nivel === 5){
            echo "NivelDoisHandler: Tratou a casca de nível 5.\n";
            return true;
        }
        echo "Não tratou - Dois - Passando para o proximo handler...\n";
        return parent::handle($casca);
    }
}
