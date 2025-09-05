<?php

// FORMA 1 implementação nativa
// Interface do Observador 
interface Observer {
    public function update(string $message);
}

// Classe Observável (Subject)
class Subject {
    private $observers = [];

    // Adiciona um observador à lista
    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    // Remove um observador da lista
    public function detach(Observer $observer) {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
                return;
            }
        }
    }

    // Notifica todos os observadores
    public function notify(string $message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

// Implementação de um Observador
class ConcreteObserver implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update(string $message) {
        echo "Observador {$this->name} recebeu a mensagem: {$message}\n";
    }
}

// Exemplo de uso
$subject = new Subject();

$observer1 = new ConcreteObserver("Observer 1");
$observer2 = new ConcreteObserver("Observer 2");

$subject->attach($observer1);
$subject->attach($observer2);

$subject->notify("Notificação 1");

$subject->detach($observer1);

$subject->notify("Notificação 2");

// FORMA 2 com libs nativas do php
// Classe Observável (Subject) que implementa SplSubject
class SubjectSpl2 implements SplSubject {
    private $observers;
    private $state;

    public function __construct() {
        // Usando SplObjectStorage para armazenar os observadores
        $this->observers = new SplObjectStorage();
    }

    // Anexa um observador
    public function attach(SplObserver $observer): void {
        $this->observers->attach($observer);
    }

    // Remove um observador
    public function detach(SplObserver $observer): void {
        $this->observers->detach($observer);
    }

    // Notifica todos os observadores
    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    // Método para mudar o estado e notificar os observadores
    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }

    // Método para obter o estado atual
    public function getState() {
        return $this->state;
    }
}

// Classe Observador (Observer) que implementa SplObserver
class ConcreteObserverSpl2 implements SplObserver {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // Método que será chamado quando o sujeito notificar
    public function update(SplSubject $subject): void {
        /** @var SubjectSpl2 $subject */
        echo "{$this->name} foi notificado. Novo estado do Subject: " . $subject->getState() . "\n";
    }
}

// Exemplo de uso
$subjectSpl2 = new SubjectSpl2();

$observer1 = new ConcreteObserverSpl2("Observer 1");
$observer2 = new ConcreteObserverSpl2("Observer 2");

$subjectSpl2->attach($observer1);
$subjectSpl2->attach($observer2);

$subjectSpl2->setState("Estado 1");

$subjectSpl2->detach($observer1);

$subjectSpl2->setState("Estado 2");

