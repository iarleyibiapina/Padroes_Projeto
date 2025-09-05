<?php

// Estrutural - cap-7

namespace Iarley\Designpattern\FlyWeight;
use Iarley\Designpattern\FlyWeight\Factory\CriadorDePedido;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Pedido\Pedido;

// classe simulando grande uso de memoria
class ConsumindoMuito
{
    // flyweight tenta separar estados que nao mudam e que mudam
    // fazendo os estados constantes serem reutilizados e otimizando 
    // performance    
    public function muito()
    {
        $pedidos = [];
        $dataHoje = new \DateTimeImmutable();
        for ($i = 0; $i < 1000; $i++) {
            $pedido = new Pedido();
            /** @var Pedido $pedido */
            $pedido->nomeCliente = md5((string) rand(1, 555555));
            $pedido->orcamento = new Orcamento(rand(1, 1000000));
            // metodo antes consumindo em torno de 12.8B
            // $pedido->dataFinalizacao = new \DateTimeImmutable();
            // mas como ele se repete para todos, eu otimizo da forma
            // mais simples extraindo ele e reutilizando
            $pedido->dataFinalizacao = $dataHoje;
            // agora consumindo 9.7B
            $pedidos[] = $pedido;
        }
        // informando o uso de memória em 
        echo memory_get_peak_usage();
    }

    public function separado()
    {
        $dados = new PedidoExtrinsico(
            md5((string) rand(1, 555555)),
            new \DateTimeImmutable(),
        );
        $pedidos = [];
        // 
        for ($i = 0; $i < 1000; $i++) {
            $pedido = new PedidoFlyweight();
            $pedido->dados = $dados;
            $pedido->orcamento = new Orcamento(200);
            $pedidos[] = $pedido;
        }
        echo memory_get_peak_usage();
        // resultou em 9.0B
    }

    // criacional - cap-1
    // usando o flyweight factory
    public function flyweightFactory()
    {
        $pedidos = [];
        $criadorDePedido = new CriadorDePedido();
        // 
        for ($i = 0; $i < 1000; $i++) {
            $orcamento = new Orcamento(200);
            $pedido = $criadorDePedido->criaPedido(
                'Teste',
            date('Y-m-d'), //pegando data atual neste formato
                $orcamento);
            $pedidos[] = $pedido;
        }
        // 
        echo memory_get_peak_usage();
        // 9.0
    }
}
