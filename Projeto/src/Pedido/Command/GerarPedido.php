<?php

namespace Iarley\Designpattern\Pedido\Command;
use DateTimeImmutable;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Pedido\Pedido;

// comando pode ser replicado em CLI ou outros lugares
class GerarPedido
{
    public function __construct(
        private float  $valorOrcamento,
        private int    $numeroItens,
        private string $nomeCliente,
    ) {
      
    }

    // sendo um comando deve ter um metodo de executar com
    // retirado apos separar em um CommandHandler
    // public function execute()
    // {
    //     $orcamento = new Orcamento($this->valorOrcamento);
    //     $orcamento->quantidadeItems = (int) $this->numeroItens;
            
            
    //     $pedido = new Pedido();
    //     $pedido->dataFinalizacao = new DateTimeImmutable();
    //     $pedido->nomeCliente = $this->nomeCliente;
    //     $pedido->orcamento   = $orcamento;
            
    //     echo "Cria pedido no banco..." . PHP_EOL;
    //     echo "Pedido finalizado com sucesso!" . PHP_EOL;
    //     printf("%d %d %s", $this->valorOrcamento ,$this->numeroItens ,$this->nomeCliente);
    // }

    // gerado apos separacao em command handler
    public function getValorcamento()
    {
        return $this->valorOrcamento;
    }
    public function getNumeroItens()
    {
        return $this->numeroItens;
    }
    public function getNomeCliente()
    {
        return $this->nomeCliente;
    }
}
