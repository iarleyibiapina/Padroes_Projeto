<?php

// tenho uma interface para todos os produtos que quero criar.
    // 
interface A 
{
    public function index(): void;
}

class ClasseA implements A 
{
    public function index(): void
    {
        echo "index A";
    }
}
// classeB implementa A, classeC implementa A...
    // assim dependendo do criador que extende da fabrica, definira qual objeto sera criado por meio do metodo fabrica

// agora eu tenho que criar a fabrica que é uma classe abstrata
abstract class AFactory
{
    abstract public function criarA(): A; // este é o factory method
    // subclasses vao definir qual classe sera instanciada (que deve implementar a interface)

    public function informacoes(): void
    {
        $A = $this->criarA(); // criando o objeto (que depende do criador)
        $A->index(); // chamando o metodo definido na interface global
    }
}

class TipoUmFactory extends AFactory
{
    public function criarA(): A
    {
        return new ClasseA(); // poderia ser o ClasseB, ClasseC...
    }
    // por meio deste criador eu posso chamar o informacoes() que retornara o objeto criado e o metodo da interface
}

//==
/*
    Pode existir uma fabrica para varios objetos definido pela interface global
    Podem existir varias fabricas para um objeto
    Uma fabrica pode ter varios criadores concretos
*/

//===Uso no cliente
echo (new TipoUmFactory())->informacoes(); // metodo da fabrica onde aplica uma certa logica e cria a classe;
// ou pode apenas instanciar a classe diretamente
$classeA = (new TipoUmFactory())->criarA();
echo "\n";
echo $classeA->index();

// meu codigo como cliente, desconhece total mente a classe concreta ClasseA, apenas a fabrica