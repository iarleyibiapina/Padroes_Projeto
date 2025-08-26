<?php

// Solicita o comando
    // nao sabe qual comando
    // nao sabe qual o receptor
class Controle
{
    private ComandoInterface $comandoInterface;

    public function __construct(ComandoInterface $comandoInterface = new ComandoPadrao(new Lampada())) 
    {
      $this->comandoInterface = $comandoInterface;
    }

    public function setCommand(ComandoInterface $comandoInterface): void
    {
        $this->comandoInterface = $comandoInterface;
    }
    public function pressionarBotao(): void
    {
        $this->comandoInterface->execute();
    }

    public function pressionarBotaoVoltar(): void
    {
        $this->comandoInterface->undo();        
    }
}
