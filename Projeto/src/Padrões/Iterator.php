<?php 

// interface do iterador
interface IteratorInterface {
    public function next();
    public function hasNext();
    public function previous();
    public function currentPosition();
}
// interface da coleçao
interface CollectionInterface {
    public function iterator(): IteratorInterface;
}
// classe concreta do iterador
class ArrayIterator implements IteratorInterface {
    private $items;
    private $position = 0;

    public function __construct(array $items) {
        $this->items = $items;
    }

    public function next() {
        return $this->items[$this->position++];
    }

    public function hasNext() {
        return isset($this->items[$this->position]);
    }

    public function previous() {
        if ($this->position > 0) {
            return $this->items[--$this->position];
        }
        return null;
    }

    public function currentPosition() {
        return $this->position;
    }
}
// Classe concreta da coleçao
class ArrayCollection implements CollectionInterface {
    private $items;

    public function __construct(array $items) {
        $this->items = $items;
    }

    public function iterator(): IteratorInterface {
        return new ArrayIterator($this->items);
    }
}
//=========================================================
$fruits = ["Apple", "Banana", "Cherry"];
$fruitCollection = new ArrayCollection($fruits);

// Usando o iterador
$fruitIterator = $fruitCollection->iterator();

while ($fruitIterator->hasNext()) {
    echo $fruitIterator->next() . "\n";
}
