<?php

// objeto que tera o estado salvo
    // cria e restaura mementos
class Originator
{
    private string $content = '';

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    public function getContent(): string 
    {
        return $this->content;
    }
    // metodo para salvar o estado atual (snapshot) deste objeto
    public function saveState(): MementoInterface
    {
        return new ConcreteMemento($this->content);
    }
    // !Originator PRECISA do restore, definindo o novo estado
    public function restore(MementoInterface $memento): void
    {
        // 1. Recebe o Memento.
        // 2. Abre e extrai o estado.
        // 3. Modifica a si mesmo.
        if($memento instanceof ConcreteMemento){
            // o estado do memento é o conteudo deste objeto
            $this->content = $memento->state();
        }
    }
}
