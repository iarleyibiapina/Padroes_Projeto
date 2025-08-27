<?php

// "zelador" 
    // guarda os mementos, nao sabe o que esta dentro deles
    // ! nunca visualiza o conteudo do memento, o memento é a caixa preta
class Caretaker
{
    /**
     * @var Originator $originator
     */
    /**
     * @var array<MementoInterface>
     */
    private array $mementos = [];

    public function __construct(private Originator $originator) {}

    public function backup(): void
    {
        echo "Historico: Salvando estado\n";
        array_push($this->mementos,
            $this->originator->saveState()
        );
    }
    
    // Pega o último Memento e pede ao Originator para se restaurar.
    public function undo(): void 
    {
        if (!count($this->mementos)) {
            return;
        }

        $memento = array_pop($this->mementos);
        echo "Histórico: Restaurando para -> " . $memento->getName() . "\n";
        $this->originator->restore($memento);
    }

    public function showHistory(): void
    {
        echo "Histórico: Lista de Mementos:\n";
        foreach ($this->mementos as $memento) {
            echo $memento->getName() . "\n";
        }
    }
}
