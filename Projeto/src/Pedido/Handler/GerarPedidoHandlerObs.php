<?php

namespace Iarley\Designpattern\Pedido\Handler;

use DateTimeImmutable;
use Iarley\Designpattern\AcoesGerarPedido\CriarPedidoNoBanco;
use Iarley\Designpattern\AcoesGerarPedido\EnviarPedidoPorEmail;
use Iarley\Designpattern\AcoesGerarPedido\GerarLogPedido;
use Iarley\Designpattern\Interface\InterfaceObserverCommand;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Pedido\Command\GerarPedido;
use Iarley\Designpattern\Pedido\Pedido;

class GerarPedidoHandlerObs
{
    // array de command
    /**
     * @var InterfaceObserverCommand[]
     */
    private array $acoesAposGerarPedido = [];

    public function __construct(/*repositorio*/) {
    }

    public function adicionarAcaoAoGerarPedido(InterfaceObserverCommand $acao)
    {
        $this->acoesAposGerarPedido[] = $acao;
    }

    public function execute(GerarPedido $gerarPedido)
    {
        $orcamento = new Orcamento($gerarPedido->getValorcamento());
        $orcamento->quantidadeItems = (int) $gerarPedido->getNumeroItens();
            
            
        $pedido = new Pedido();
        $pedido->dataFinalizacao = new DateTimeImmutable();
        $pedido->nomeCliente = $gerarPedido->getNomeCliente();
        $pedido->orcamento   = $orcamento;
            
        // dividindo mais as camadas
        // $pedidoRepository = new CriarPedidoNoBanco();
        // $gerarLog         = new GerarLogPedido();
        // $enviarEmail      = new EnviarPedidoPorEmail();
        
        // porem ainda teria problema de escalabilidade e crescimento de classe
        // executando açao
        // $pedidoRepository->executaAcao($pedido);
        // $gerarLog->executaAcao($pedido);
        // $enviarEmail->executaAcao($pedido);
        foreach($this->acoesAposGerarPedido as $acao){
            $acao->executaAcao($pedido);
        }

        // agora na classe fora, eu defino os commands e aqui dentro apenas executa
        // handler->setCommand(new Comando)
    }
}

