<?php


class ConcreteCollection implements Collection
{
    private array $dados = [];

    public function __construct() {
      $this->dados = json_decode(file_get_contents(__DIR__ . "/dados.json"), true);
    }

    public function createIterator(): IteratorPadrao
    {
        return new ConcreteIterator($this->dados);
    }
}
