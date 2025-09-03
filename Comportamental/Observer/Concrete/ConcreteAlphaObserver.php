<?php

class ConcreteAlphaObserver implements Observer
{
    // estou atualizando o estado da propria classe, mas pode ser de outras classes
    // ou para um log
    public bool $aviso = false;
    public function update(...$unknown): void
    {
        if($unknown) $this->aviso = !$this->aviso;
    }
}
