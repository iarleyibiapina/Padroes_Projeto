<?php

interface IteratorPadrao
{
    public function first(): ?CascaIterator;
    public function nextt(): ?CascaIterator; 
    public function previouss(): ?CascaIterator; 
    public function hasNext(): bool;
    public function currentItem(): ?CascaIterator;
    public function reset(): void;
    public function length(): int;
    public function key(): int;
}
