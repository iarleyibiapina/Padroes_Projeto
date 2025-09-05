<?php

require_once __DIR__.'/../../vendor/autoload.php';

// pegando argumentos para a linha de comando

// use Iarley\Designpattern\Orcamento;

use Iarley\Designpattern\AcoesGerarPedido\CriarPedidoNoBanco;
use Iarley\Designpattern\AcoesGerarPedido\CriarPedidoNoBancoObserver;
use Iarley\Designpattern\AcoesGerarPedido\EnviarPedidoPorEmail;
use Iarley\Designpattern\AcoesGerarPedido\EnviarPedidoPorEmailObserver;
use Iarley\Designpattern\AcoesGerarPedido\GerarLogPedido;
use Iarley\Designpattern\AcoesGerarPedido\GerarLogPedidoObserver;
use Iarley\Designpattern\Pedido\Command\GerarPedido;
use Iarley\Designpattern\Pedido\Handler\GerarPedidoHandler;
use Iarley\Designpattern\Pedido\Handler\GerarPedidoHandlerCore;
use Iarley\Designpattern\Pedido\Handler\GerarPedidoHandlerObs;

// use Iarley\Designpattern\Pedido\Pedido

$valorOrcamento = $argv[1];
$numeroItens    = $argv[2];
$nomeCliente    = $argv[3];

// antes de extrair classe
// $orcamento = new Orcamento($valorOrcamento);
// $orcamento->quantidadeItems = (int) $numeroItens;


// $pedido = new Pedido();
// $pedido->dataFinalizacao = new DateTimeImmutable();
// $pedido->nomeCliente = $nomeCliente;
// $pedido->orcamento   = $orcamento;

// echo "Cria pedido no banco..." . PHP_EOL;
// echo "Pedido finalizado com sucesso!" . PHP_EOL;
// printf("%d %d %s", $valorOrcamento ,$numeroItens ,$nomeCliente);


// agora como comando extraido, basta apenas executar ele aqui e em 
// qualquer outro lugar.

// se houver mais comandos é possivel ter uma interface tambem.
// um gerenciador de comandos, com uma fila na qual vai executar
// cada comando.
// versao 1
// (new GerarPedido($valorOrcamento, $numeroItens, $nomeCliente))->execute(); 

// versao 2
// prepara classe com seus valores
$gerarPedido = new GerarPedido($valorOrcamento, $numeroItens, $nomeCliente); 
// injeta dependencia e executa o command
(new GerarPedidoHandler())->execute($gerarPedido);

echo PHP_EOL;

// versao 3 com 'observer'
$gerarOutro = new GerarPedidoHandlerObs();
$gerarOutro->adicionarAcaoAoGerarPedido(new EnviarPedidoPorEmail());
$gerarOutro->adicionarAcaoAoGerarPedido(new GerarLogPedido());
$gerarOutro->adicionarAcaoAoGerarPedido(new CriarPedidoNoBanco());
$gerarOutro->execute($gerarPedido); // lembrar de passar parametro no cli.

echo PHP_EOL;

// versao 4 com 'observer' padrao do php
$gerarObs = new GerarPedidoHandlerCore();
$gerarObs->attach(new EnviarPedidoPorEmailObserver());
$gerarObs->attach(new GerarLogPedidoObserver());
$gerarObs->attach(new CriarPedidoNoBancoObserver());
$gerarObs->execute($gerarPedido); // lembrar de passar parametro no cli.






