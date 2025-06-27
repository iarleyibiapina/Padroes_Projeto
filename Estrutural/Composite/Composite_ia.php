<?php

// Componente: A interface que unifica tanto as folhas quanto os compostos.
interface SistemaDeArquivosInterface
{
    /**
     * Retorna o tamanho em kilobytes.
     */
    public function getTamanho(): int;
}

// Leaf (Folha): Representa um objeto individual.
// Não pode ter filhos.
class Arquivo implements SistemaDeArquivosInterface
{
    public function __construct(
        private string $nome,
        private int $tamanho // em KB
    ) {}

    /**
     * Para um arquivo, o tamanho é simplesmente seu próprio tamanho.
     */
    public function getTamanho(): int
    {
        echo "Calculando tamanho do arquivo '{$this->nome}': {$this->tamanho} KB\n";
        return $this->tamanho;
    }
}

// Composite (Composto): Representa um grupo de objetos.
// Pode ter filhos (folhas ou outros compostos).
class Pasta implements SistemaDeArquivosInterface
{
    /** @var SistemaDeArquivosInterface[] */
    private array $filhos = [];

    public function __construct(private string $nome) {}

    /**
     * Adiciona um item (arquivo ou outra pasta) à esta pasta.
     */
    public function adicionar(SistemaDeArquivosInterface $componente): void
    {
        $this->filhos[] = $componente;
    }

    /**
     * Remove um item da pasta.
     */
    public function remover(SistemaDeArquivosInterface $componenteParaRemover): void
    {
        $this->filhos = array_filter($this->filhos, fn($c): bool => $c !== $componenteParaRemover );
    }

    /**
     * A mágica do padrão Composite acontece aqui.
     * Para obter o tamanho da pasta, ela delega a chamada para todos os seus filhos
     * e soma os resultados.
     */
    public function getTamanho(): int
    {
        echo "--- Entrando na pasta '{$this->nome}' para calcular o tamanho ---\n";
        $tamanhoTotal = 0;
        foreach ($this->filhos as $filho) {
            // Chama o mesmo método getTamanho() em cada filho,
            // não importa se é um Arquivo ou outra Pasta.
            $tamanhoTotal += $filho->getTamanho();
        }
        echo "--- Tamanho total da pasta '{$this->nome}': {$tamanhoTotal} KB ---\n";
        return $tamanhoTotal;
    }
}
//===============
// CLIENTE
// Inclua as classes e a interface aqui...

// --- CRIANDO AS FOLHAS (ARQUIVOS) ---
$arquivo1 = new Arquivo("documento.docx", 250);
$arquivo2 = new Arquivo("foto_ferias.jpg", 1500);
$arquivo3 = new Arquivo("planilha.xlsx", 500);
$arquivo4 = new Arquivo("sistema.exe", 10000);

// --- CRIANDO OS COMPOSTOS (PASTAS) ---
$pastaDocumentos = new Pasta("Meus Documentos");
$pastaProgramas = new Pasta("Programas");
$pastaRaiz = new Pasta("Disco C:");

// --- MONTANDO A ÁRVORE ---
// Adicionando arquivos na pasta de documentos
$pastaDocumentos->adicionar($arquivo1);
$pastaDocumentos->adicionar($arquivo3);

// Adicionando arquivo na pasta de programas
$pastaProgramas->adicionar($arquivo4);

// Adicionando as pastas e um arquivo solto na pasta raiz
$pastaRaiz->adicionar($pastaDocumentos);
$pastaRaiz->adicionar($pastaProgramas);
$pastaRaiz->adicionar($arquivo2); // foto_ferias.jpg fica na raiz

// --- CALCULANDO O TAMANHO ---
echo "\n=============================================\n";
echo "Calculando o tamanho total do disco...\n";
echo "=============================================\n";

// O código cliente não precisa saber se $pastaRaiz é uma pasta ou um arquivo.
// Ele simplesmente chama o método getTamanho().
$tamanhoTotalDoDisco = $pastaRaiz->getTamanho();

echo "\n=============================================\n";
echo "O TAMANHO TOTAL DO DISCO É: {$tamanhoTotalDoDisco} KB\n"; // Deve ser 12250
echo "=============================================\n";
