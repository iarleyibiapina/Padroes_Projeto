<?php

// possui metodos para executar uma operacao
interface ComandoInterface
{
    public function execute(): void;
    public function undo(): void;
}
