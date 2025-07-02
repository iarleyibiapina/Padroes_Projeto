<?php

// Exemplo de adapter se implementando uma lib externa

class PacoteExterno 
{
    public function metodoExterno(): int
    {
        return random_int(0, 10);
    }
}


interface MeuAdaptee
{
    public function metodo(): int;
}

// Se classe externa alterar, apenas mudo como eu implemento a classe externa
// Se meu dominio alterar, apenas mudo como eu retorno
class AdaptadorDeClasse implements MeuAdaptee
{
    protected PacoteExterno $pacoteExterno;
    public function __construct() {
        $this->pacoteExterno = new PacoteExterno();
    }

    public function metodo(): int
    {
        return $this->pacoteExterno->metodoExterno();
    }
}
$metodoExterno = new PacoteExterno();
$adaptador = new AdaptadorDeClasse();
die(var_dump($metodoExterno->metodoExterno(),$adaptador->metodo()));