<?php

class ConcreteIterator implements IteratorPadrao
{
    public int $index = 0;
    public function __construct(private array $dados) {
        // pode ser a propria classe Collecao, com seus metodos de acesso
    }
    public function first(): ?CascaIterator
    {
        $dado = $this->dados[0];
        if(!$dado) return null;
        return new CascaIterator(
            $dado['id'],
            $dado['nome'],
            $dado['email'],
            $dado['idade'],
            $dado['ativo'],
        );
         
    }
    public function nextt(): ?CascaIterator
    {
        $index = $this->index;
        if(! isset($this->dados[++$index])) return null;
        $dado = $this->dados[++$this->index];
        return new CascaIterator(
            $dado['id'],
            $dado['nome'],
            $dado['email'],
            $dado['idade'],
            $dado['ativo'],
        );
    }
    public function previouss(): ?CascaIterator
    {
        $index = $this->index;
        if(! isset($this->dados[--$index])) return null;
        $dado = $this->dados[--$this->index];
        return new CascaIterator(
            $dado['id'],
            $dado['nome'],
            $dado['email'],
            $dado['idade'],
            $dado['ativo'],
        );
    }
    public function hasNext(): bool
    {
        $index = $this->index;
        return isset($this->dados[$index++]);
    }
    public function reset(): void
    {
        $this->index = 0;
    }
    public function currentItem(): ?CascaIterator
    {
        $dado = $this->dados[$this->index];
        if(!$dado) return null;
        return new CascaIterator(
            $dado['id'],
            $dado['nome'],
            $dado['email'],
            $dado['idade'],
            $dado['ativo'],
        );
    }
    public function length(): int
    {
        $length = 0;
        while(isset($this->dados[$length])){
            $length++;
        }
        return $length;
    }
    public function key(): int
    {
        return $this->index;
    }
}
