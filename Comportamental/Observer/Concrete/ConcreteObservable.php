<?php

class ConcreteObservable implements Observable
{
    /**
     * @var Observer[] $observers
     */
    protected ?array $observers = [];
    public function notify(): void
    {
        foreach ($this->observers as $index => $observer) {
            echo "Atualizando estado do observer [$index] - " . get_class($observer) . "\n";
            $observer->update(true);
        }
    }

    public function subscribe(Observer ...$observer): void
    {
        foreach ($observer as $o) {
            $this->observers[] = $o;
        }
    }

    public function unsubscribe(Observer $observer): void
    {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) unset($this->observers[$key]);
    }
}
