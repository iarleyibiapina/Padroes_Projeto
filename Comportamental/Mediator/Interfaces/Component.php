<?php

// Esta interface é o Colleague

// A classe Componente base fornece a funcionalidade básica
// de armazenar a instância de um mediador dentro dos objetos componentes.
abstract class Component
{
    protected FormMediator $mediator;

    public function __construct(FormMediator $mediator)
    {
        $this->mediator = $mediator;
    }
}