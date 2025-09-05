<?php

namespace Iarley\Designpattern\Pedido\Handler;

use DateTimeImmutable;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Pedido\Command\GerarPedido;
use Iarley\Designpattern\Pedido\Pedido;

class GerarPedidoHandler
{
    // desta forma eu passaria as dependencias no construtor.. 
    // omo repositorio, serviço, etc.
    public function __construct(/*repositorio*/) {
      
    }

    // desta forma o command teria no seu construtor os valores necessarios
    // e este handler teria as dependencias necessarias
    public function execute(GerarPedido $gerarPedido)
    {
        $orcamento = new Orcamento($gerarPedido->getValorcamento());
        $orcamento->quantidadeItems = (int) $gerarPedido->getNumeroItens();
            
            
        $pedido = new Pedido();
        $pedido->dataFinalizacao = new DateTimeImmutable();
        $pedido->nomeCliente = $gerarPedido->getNomeCliente();
        $pedido->orcamento   = $orcamento;
            
        // por fim usaria os serviços
        // repositorio
        echo "Cria pedido no banco..." . PHP_EOL;
        // mailservice
        echo "Pedido finalizado com sucesso!" . PHP_EOL;
        printf("%d %d %s", $gerarPedido->getValorcamento() ,$gerarPedido->getNumeroItens() ,$gerarPedido->getNomeCliente());
    }
}
