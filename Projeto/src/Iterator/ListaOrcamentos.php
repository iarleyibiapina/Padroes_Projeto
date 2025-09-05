<?php

namespace Iarley\Designpattern\Iterator;

use Iarley\Designpattern\Estado\Finalizado;
use Iarley\Designpattern\Orcamento;

// antes
// class ListaOrcamentos

// implementando uma interface do php apenas para transformar um objeto em algo percorrivel
class ListaOrcamentos implements \IteratorAggregate
{
    /**
     * @var Orcamento[]
     */
    private array $orcamentos = [];


    public function addOrcamento(Orcamento $orcamento): void
    {
        $this->orcamentos[] = $orcamento;        
    }

    // retornando um array dos orcamentos, mas a ideia é retirar este metodo.
    // e fazer o foreach direto na classe.
    // public function orcamentos(): array
    // {
    //     return $this->orcamentos;
    // }

    // retorna apenas finalizados
    public function orcamentosFinalizados(): array
    {
        // este metodo aceita apenas array, estou passando o ojbeto
        // mas ele é tratado como array e o metodo filtra.
        return array_filter(
            $this->orcamentos,
            fn (Orcamento $orcamento) => $orcamento->estadoAtual instanceof Finalizado
        );
    }

    // este metodo da interface tem como objetivo expor algo percorrivel
    // esse algo vai ser o meu array de orcamento
    // logo eu retorno um iterador de array
    public function getIterator(): \Traversable
    {
        // agora é possivel aplicar o foreach direto na classe
        return new \ArrayIterator($this->orcamentos);
    }
}
