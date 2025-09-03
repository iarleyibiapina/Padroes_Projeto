<?php

// Agora este especialista implementa sua logica de XML para cada estabelecimento
class ExportarXMLVisitor implements Visitor
{
    public function visitCafeteria(Cafeteria $cafeteria): void
    {
        echo "<cafeteria>\n";
        echo "  <nome>{$cafeteria->nome}</nome>\n";
        echo "  <vendas>{$cafeteria->vendasDeCafe}</vendas>\n";
        echo "</cafeteria>\n";
    }

    public function visitLivraria(Livraria $livraria): void
    {
        echo "<livraria>\n";
        echo "  <nome>{$livraria->nome}</nome>\n";
        echo "  <livros_vendidos>{$livraria->livrosVendidos}</livros_vendidos>\n";
        echo "</livraria>\n";
    }
}