<?php

// os objetos possuem uma interface comum.

// define uma interface com um metodo comum para a folha e o composto
    // folha apenas implementa o metodo
    // composto implementa o metodo, um atributo para armazenar itens filhos, metodos para manipular filhos

interface TeraInterface
{
    /**
     * Se folha retorna valor 
     * Se composto itera sobre os filhos pegando valor até chegar em uma folha
     * @return int
     */
    public function metodoComum(): int;
}

/* 
! Como Folha e Composto recebem a mesma interface, os metodos para o composto nao fazem 
! sentido em Folha, tendo metodos fantasma.
? a saida seria implementar os metods, porem nao executando logica alguma
*/
class TeraFolha implements TeraInterface
{
    public function metodoComum(): int
    {
        return 1; // nesse caso, o total depende de onde parte a chamada por meio do composto
        // e tambem da soma de cada filho folha existente
    }
}

// ideia: criar uma abstrata com um atributo array tendo uma interface global
    // implementa metodo para adicionar e remover filho, o metodo comum ja é implementado via interface
class TeraComposto implements TeraInterface
{
    /**
     * Pode ter filho Folha ou Composto
     * @var array[TeraInterface]
     */
    private array $filhos;

    // metodo que todo composto deve ter
    /**
     * Adiciona um item (arquivo ou outra pasta) à esta pasta.
     * @param TeraInterface $componente
     * @return void
     */
    public function adicionar(TeraInterface $componente): void
    {
        $this->filhos[] = $componente;
    }

    /**
     * Remove um item da pasta.
     * @param TeraInterface $componenteParaRemover
     * @return void
     */
    public function remover(TeraInterface $componenteParaRemover): void
    {
        // compara classes
        $this->filhos = array_filter($this->filhos, fn($c): bool => $c !== $componenteParaRemover );
    }

    /**
     * se folha apenas retorna valor.
     * se composto, acaba se tornando uma funcao recursiva até 
     * chegar na folha.
     * @return int
     */
    public function metodoComum(): int
    {
        $total = 0;
        foreach ($this->filhos as $filho) {
            $total += $filho->metodoComum(); 
        }
        return $total;
    }
}

$folha1 = new TeraFolha();
$folha2 = new TeraFolha();
$folha3 = new TeraFolha();
// 
$composto1 = new TeraComposto();
$composto2 = new TeraComposto();
// 

$composto1->adicionar($folha1);
$composto1->adicionar($composto2);
$composto2->adicionar($folha2);
$composto2->adicionar($folha3);


// die(var_dump($composto1->metodoComum())); // deve retornar 3, por ter 3 folhas no total a partir deste composto
die(var_dump($composto2->metodoComum())); // deve retornar 2, por ter 2 folhas no total a partir deste composto