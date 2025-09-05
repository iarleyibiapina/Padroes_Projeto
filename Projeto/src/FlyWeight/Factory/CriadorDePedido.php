<?php

// criacionais - cap-1

namespace Iarley\Designpattern\FlyWeight\Factory;

use Iarley\Designpattern\FlyWeight\PedidoExtrinsico;
use Iarley\Designpattern\FlyWeight\PedidoFlyweight;
use Iarley\Designpattern\Orcamento;

class CriadorDePedido
{
    private array $dados = [];

    public function criaPedido(
        string $nome, 
        string $dataFormatada,
        Orcamento $orcamento
    ): PedidoFlyweight {
        // template refere o dado extrinseco
        $dados = $this->instanciaDados($nome, $dataFormatada);
        $pedido = new PedidoFlyweight();
        $pedido->dados = $dados;
        $pedido->orcamento = $orcamento;
        // 
        return $pedido;
    }

    private function instanciaDados(string $nome, string $dataFormatada): PedidoExtrinsico
    {
        // formando uma chave para a instancia.
        $hash = md5($nome . $dataFormatada);
        // se nao existir uma instancia ele cria o cache.
        if(!array_key_exists($hash, $this->dados)){
            $dados = new PedidoExtrinsico(
                $nome,    
                 new \DateTimeImmutable($dataFormatada));
        // cria hash e armazena o 'cache'
            $this->dados[$hash] = $dados;
        }
        return $this->dados[$hash];
    }
}