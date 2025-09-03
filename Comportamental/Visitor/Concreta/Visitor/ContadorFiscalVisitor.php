<?php

class ContadorFiscalVisitor implements Visitor
{
    public function visitCafeteria(Cafeteria $cafeteria): void
    {
        $imposto = $cafeteria->vendasDeCafe * 0.15; // Imposto de 15% sobre o café
        echo "Calculando imposto para a Cafeteria '{$cafeteria->nome}': R$ " . number_format($imposto, 2) . "\n";
    }

    public function visitLivraria(Livraria $livraria): void
    {
        // Livros têm isenção fiscal
        echo "Aplicando isenção fiscal para a Livraria '{$livraria->nome}'.\n";
    }
}