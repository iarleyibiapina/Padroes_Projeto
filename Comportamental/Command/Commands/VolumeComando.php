<?php

class VolumeComando implements ComandoInterface
{
    private Lampada $lampada;

    public function __construct(Lampada $lampada) 
    {
        $this->lampada = $lampada;
    }

    public function execute(): void
    {
        $this->lampada->volume += 5;
    }

    public function undo(): void
    {
        $this->lampada->volume -= 5;
    }
}
