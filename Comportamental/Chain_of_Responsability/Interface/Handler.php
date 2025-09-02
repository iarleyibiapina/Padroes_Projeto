<?php

abstract class Handler
{
    protected ?Handler $nextHandler = null;

    public function setNextHandler(Handler $handler)
    {
        $this->nextHandler = $handler;
        return $handler; // retornando o proprio handler passado é possivel encadear
        // metodos e definir o proximo do proximo... $h1->setNext($h2)->setNext($h3);
    }

    public function handle(Casca $casca)
    {
        // ? aqui posso definir uma exeucao padrao se nao houer outros handlers
        // executa a funcao do handler aninhado até o ultimo (o ultimo vai ter como proximo nulo)
        if($this->nextHandler) return $this->nextHandler->handle($casca);
        echo "Ninguem tratou\n";
        return; 
    }
}
