<?php

interface ProdutoComum
{
    // fabricas devem retornar produtos que implementem essa interface
}

class ProdutoExemplo implements ProdutoComum
{
    public function __construct(public mixed $exemplo) {}
}

//=======================

/**
 * A classe Criadora Abstrata (Creator).
 * Declara o "Factory Method", que retorna um objeto do tipo ProdutoComum.
 * Este método NÃO é estático.
 */
abstract class FabricaAbstrata
{
    /**
     * Este é o Factory Method. Note que é abstrato e de instância.
     * As subclasses devem fornecer a implementação.
     */
    abstract public function criarProduto(): ProdutoComum;

    // A beleza aqui é que a classe abstrata pode ter lógica que usa o produto
    // sem saber qual produto concreto é.
    public function getInfoDoProdutoCriado(): string
    {
        /**
         * @var ProdutoExemplo
         */
        $produto = $this->criarProduto();
        $classeProduto = get_class($produto);
        $valorExemplo = $produto->exemplo;
        return "A fábrica '" . static::class . "' criou um '{$classeProduto}' com o valor: '{$valorExemplo}'.";
    }
}

//===================

// fabricas concretas herdam e implemetam o metodo 'criarProduto()'

/**
 * Criador Concreto A
 */
class ExemploCriador extends FabricaAbstrata
{
    public function criarProduto(): ProdutoComum
    {
        return new ProdutoExemplo("fabrica_1");
    }
}

/**
 * Criador Concreto B
 */
class CriaCriaCriador extends FabricaAbstrata
{
    public function criarProduto(): ProdutoComum
    {
        return new ProdutoExemplo("fabrica_2");
    }
}

/**
 * Criador Concreto C (que precisa de um parâmetro)
 * O parâmetro agora é passado para o CONSTRUTOR da fábrica.
 */
class ComParamCriador extends FabricaAbstrata
{
    public function __construct(private mixed $param) {}

    public function criarProduto(): ProdutoComum
    {
        // Usa o parâmetro que foi guardado no construtor
        return new ProdutoExemplo($this->param);
    }
}

//=====================

/**
 * O código cliente trabalha com a interface da fábrica abstrata.
 * Ele não sabe qual fábrica concreta está recebendo, mas sabe que
 * pode chamar os métodos dela.
 */
function codigoCliente(FabricaAbstrata $fabrica)
{
    // O cliente não chama 'new ProdutoExemplo()'.
    // Ele pede para a fábrica criar o produto.
    echo $fabrica->getInfoDoProdutoCriado() . "\n";
}

echo "Cliente sendo executado com a fábrica ExemploCriador:\n";
codigoCliente(new ExemploCriador());

echo "\nCliente sendo executado com a fábrica CriaCriaCriador:\n";
codigoCliente(new CriaCriaCriador());

echo "\nCliente sendo executado com a fábrica ComParamCriador:\n";
codigoCliente(new ComParamCriador("valor passado dinamicamente"));

// Se só quiser o produto, o uso direto seria:
$fabrica = new ExemploCriador();
$produto = $fabrica->criarProduto();
var_dump($produto);