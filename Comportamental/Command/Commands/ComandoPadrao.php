<?php

// Comando Concreto, implementa a interface de comando

// Supondo que a interface tenha apenas o metodo 'execute', entao eu teria dois comandos:
//  um para ligar e outro para desligar
class ComandoPadrao implements ComandoInterface
{
    private Lampada $lampada;

    public function __construct(Lampada $lampada) 
    {
        $this->lampada = $lampada;
    }

    public function execute(): void
    {
        $this->lampada->on();
    }

    public function undo(): void
    {
        $this->lampada->off();
    }
}
