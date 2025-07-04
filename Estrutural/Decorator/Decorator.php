<?php
// Interface para produto
interface ProdutoInterface
{
    public function method(): void;
    public function addNaLista(string $item): void;
    public function getLista(): array;
}

// Interface para Decoradores
    // Pode ser uma abstrata
        // Pode ser uma classe Comum
abstract class Decorador implements ProdutoInterface
{
    public function __construct(public ProdutoInterface $produto) {}
    abstract public function method(): void;
    // O decorador simplesmente delega a chamada para o objeto que ele envolve
    public function addNaLista(string $item): void
    {
        $this->produto->addNaLista($item);
    }
    
    public function getLista(): array
    {
        return $this->produto->getLista();
    }
}

class ProdutoConcreto implements ProdutoInterface
{
    public array $lista = [];

    // comportamento padrao, adiciona 1 elemento
    public function method(): void
    {
        $this->addNaLista("Comportamento Base");
    }

    public function addNaLista(string $item): void
    {
        $this->lista[] = $item;
    }

    public function getLista(): array
    {
        return $this->lista;
    }
}

// Produto Concreto que sera decorado

/**
 * Este decorador adiciona um comportamento ANTES da chamada original.
 */
class ConcretoDecoradorA extends Decorador
{
    public function method(): void
    {
        // 1. Adiciona o novo comportamento.
        $this->produto->addNaLista('Adição do Decorador A (antes)');
        // 2. Chama o método do objeto original (ou do decorador anterior).
        $this->produto->method(); 
    }
}
/**
 * Este decorador adiciona um comportamento DEPOIS da chamada original.
 */
class ConcretoDecoradorB extends Decorador
{
    public function method(): void
    {
        // 1. Chama o método do objeto original (ou do decorador anterior).
        $this->produto->method();
        // 2. Adiciona o novo comportamento.
        $this->produto->addNaLista('Adição do Decorador B (depois)');
    }
}

// 1. Começamos com o objeto base.
$produtoSimples = new ProdutoConcreto(); # estado original 1

// 2. "Embrulhamos" o objeto simples com o primeiro decorador.
$produtoDecoradoA = new ConcretoDecoradorA($produtoSimples); # modifica estado 1 para 2

// 3. "Embrulhamos" o objeto JÁ DECORADO com o segundo decorador.
//    É como montar uma cebola, com camadas.
$produtoFinal = new ConcretoDecoradorB($produtoDecoradoA); # modifica estado 2 para 3

// 4. Chamamos o método no objeto mais externo.
echo "Executando o método no objeto totalmente decorado...\n";
$produtoFinal->method(); # acessa atributo em estado 3

// 5. Verificamos o resultado no objeto original.
//    Como todos os decoradores operam na mesma instância, o array $lista é compartilhado.
print_r($produtoSimples->lista);