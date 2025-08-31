<?php

// A interface Mediator declara um método usado pelos componentes
// para notificar o mediador sobre vários eventos.
interface FormMediator
{
    public function notify(Component $sender, string $event): void;
}