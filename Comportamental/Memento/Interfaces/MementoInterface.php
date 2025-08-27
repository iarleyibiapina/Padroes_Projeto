<?php

// onde o caretaker usa para interagir com o objeto memento.
    // obtem metadados sobre o estado salvo, mas nao expoe o estado em si.
interface MementoInterface
{
    public function getName();
    public function getDate();
}
