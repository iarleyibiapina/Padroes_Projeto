<?php

// Armazena o estado do "originator"
// apenas o originator que o criou tem acesso ao estado de volta
class ConcreteMemento implements MementoInterface
{
    private string $date;
    public function __construct(private mixed $state) {
        $this->date = date('Y-m-d H:i:s');
    }
    public function state(): mixed
    {
        return $this->state;
    }
    public function getName()
    {
        return $this->state;
    }
    public function getDate()
    {
        return $this->date;
    }
}
