<?php
/* 
Backup (salvar)
    1.'Caretaker' (historico) solicita ao 'Originator' que salve seu estado
    2.O 'Originator' cria um objeto 'ConcreteMemento', passando seu estado 
        atual para o construtor do memento
    3.O 'Originator' retorna este memento para o 'Caretaker'
    4.O 'Caretaker' armazena o Memento em uma lista

Undo (restaurar)
    1.O Caretaker pega o Memento mais recente de sua lista.
    2.O Caretaker entrega este Memento ao método restore() do Originator.
    3.Dentro do método restore(), o Originator extrai o estado de dentro 
        do Memento (ele tem permissão para fazer isso) e o usa para 
        sobrescrever seu próprio estado atual.
*/

require_once __DIR__ . '/Interfaces/MementoInterface.php';
require_once __DIR__ . '/ConcreteMemento.php';
require_once __DIR__ . '/Caretaker.php';
require_once __DIR__ . '/Originator.php';

$originator = new Originator();
$caretaker  = new Caretaker($originator);

$originator->setContent("conew");
$caretaker->backup(); // salva o estado conew

$originator->setContent("novo contetn");
$caretaker->backup(); // salva o novo contetn

$originator->setContent("terceiro");

echo $caretaker->showHistory();

echo "\nTexto Atual: " . $originator->getContent() . "\n\n";

$caretaker->undo(); // ao fazer o undo, o caretaker chama o metodo diretamente no objeto alvo
// originator, que possui um metodo 'restore' onde ele sobrescreve o estado para o estado do memento
echo "Depois do 1º undo: " . $originator->getContent() . "\n";

$caretaker->undo();
echo "Depois do 2º undo: " . $originator->getContent() . "\n";