<?php

namespace Iarley\Designpattern;

use DomainException;
use Iarley\Designpattern\Composite\Interface\Orcavel;
use Iarley\Designpattern\Composite\ItemOrcamento;
use Iarley\Designpattern\Estado\EmAprovacao;
use Iarley\Designpattern\Estado\Estado;

// estrutural - cap-4 implementa a interface Orcavel
class Orcamento implements Orcavel
{
    public int $quantidadeItems; // Cap-2
    public Estado $estadoAtual; // cap-4 - comportamental

    // cap-4 - estrutural

    // /** @var ItemOrcamento[] */
    /** @var Orcavel[] */
    private array $itens = [];

    public function __construct(public float $valor) {
        $this->estadoAtual = new EmAprovacao();
    }

    // antes do padrao
    // public function aplicaDescontoExtra1()
    // {
        // $this->valor -= $this->calculaDescontoExtra1();
    // }

    // public function calculaDescontoExtra1(): float|DomainException
    // {
    //     if($this->estadoAtual1 === "EM_APROVACAO") return $this->valor * 0.05;
    //     if($this->estadoAtual1 === "APROVADO") return $this->valor * 0.02;
    //     throw new DomainException('Orçamento reprovado e finalizado');
    // }

    // depois
    public function aplicaDescontoExtra()
    {
        // $this é a propria classe
        $this->valor -= $this->estadoAtual->calculaDescontoExtra($this);
    }

    // aqui é onde pode ser lançado a logica que throws da classe pai Estado

    public function aprova()
    {
        $this->estadoAtual->aprova($this);
    }

    public function reprova()
    {
        $this->estadoAtual->reprova($this);
    }

    public function finaliza()
    {
        $this->estadoAtual->finaliza($this);
    }

    // cap-4 - estrutural
    // depois é trocado de ItemOrcamento
    // para Orcavel, onde pode ser um item ou outro orcamento com varios itens dentro
    public function setItem(Orcavel $orcavel): void
    {
        $this->itens[] = $orcavel;
    }

    // cap-4 - estrutural
    public function valor(): float
    {   
        // return array_reduce($this->itens,fn (float $acumulado, ItemOrcamento $item): float => $acumulado += $item->valor(),0);

        // cap-6
        // Simulando metodo complexo que demora para o uso do proxy
        sleep(2);
        return array_reduce($this->itens,fn (float $acumulado, Orcavel $item): float => $acumulado += $item->valor(),0);
    }
}
