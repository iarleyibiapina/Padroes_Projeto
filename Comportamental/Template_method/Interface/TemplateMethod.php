<?php

abstract class TemplateMethod implements Methods
{
    protected string $resultado = "";
    private function um(): void
    {
        $this->resultado .= "um ";
    }
    private function dois(): void
    {
        $this->resultado .= "dois ";
    }
    private function tres(): void
    {
        $this->resultado .= "tres ";
    }
    // metodos abstratos onde subclasses definem seus proprios passos
    abstract protected function quatro(): void;
    abstract protected function cinco(): void;
    // a ordem dos passos é fixa
        // ! NAO muda a ordem de execucao
        // recomendado ser final, para manter essa ordem correta
    final public function resultado(): string
    {
        $this->um();
        $this->dois();
        $this->tres();
        $this->quatro();
        $this->cinco();
        return $this->resultado;
    }
}
