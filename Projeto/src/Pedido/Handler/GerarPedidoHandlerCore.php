<?php

namespace Iarley\Designpattern\Pedido\Handler;

use DateTimeImmutable;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Pedido\Command\GerarPedido;
use Iarley\Designpattern\Pedido\Pedido;
use SplObserver;
use SplSubject;

// usando a interface nativa do PHP
// esta interface define que eu irei notificar alguem 
// que algo aconteceu.
class GerarPedidoHandlerCore implements SplSubject
{
    /**
     * @var SplObserver[]
     */
    private array $acoesAposGerarPedido = [];


    private Pedido $pedido;

    public function __construct(/*repositorio*/) {
    }

    public function execute(GerarPedido $gerarPedido)
    {
        $orcamento = new Orcamento($gerarPedido->getValorcamento());
        $orcamento->quantidadeItems = (int) $gerarPedido->getNumeroItens();
            
            
        $pedido = new Pedido();
        $pedido->dataFinalizacao = new DateTimeImmutable();
        $pedido->nomeCliente = $gerarPedido->getNomeCliente();
        $pedido->orcamento   = $orcamento;
        $this->pedido = $pedido;
        $this->notify();
    }

    // adicionar o observer
    public function attach(SplObserver $observer): void
    {
        // salvar no array os observer
        $this->acoesAposGerarPedido[] = $observer;
    }

    // remover o observer
    public function detach(SplObserver $observer): void
    {
        foreach ($this->acoesAposGerarPedido as $key => $acao) {
            if ($acao === $observer) {
                unset($this->acoesAposGerarPedido[$key]);
                // Reindexa o array
                $this->acoesAposGerarPedido = array_values($this->acoesAposGerarPedido);
                break;
            }
        }
    }

    // execeuta as acoes
    public function notify(): void
    {
        foreach($this->acoesAposGerarPedido as $acao){
            // 'acao' da classe;
            $acao->update($this); // normalmente o param é a propria classe
        }
    }

    public function getPedido(): Pedido
    {
        return $this->pedido;
    }
}

