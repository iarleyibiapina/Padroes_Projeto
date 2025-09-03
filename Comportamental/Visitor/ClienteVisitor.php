<?php 

require_once __DIR__ . "/Interfaces/Element.php";
require_once __DIR__ . "/Interfaces/Visitor.php";
require_once __DIR__ . "/Concreta/Element/Livraria.php";
require_once __DIR__ . "/Concreta/Element/Cafeteria.php";
require_once __DIR__ . "/Concreta/Visitor/ContadorFiscalVisitor.php";
require_once __DIR__ . "/Concreta/Visitor/ExportarXMLVisitor.php";


// 1. Criar a estrutura de objetos (ObjectStructure)
$estabelecimentos = [
    new Cafeteria("Café Central", 5000.00),
    new Livraria("Páginas de Saber", 120)
];

// --- OPERAÇÃO 1: Calcular Impostos ---
echo "--- Executando o Contador Fiscal Visitor ---\n";
$contador = new ContadorFiscalVisitor();
foreach ($estabelecimentos as $estabelecimento) {
    // O cliente só precisa chamar "accept", a mágica do double dispatch faz o resto.
    $estabelecimento->accept($contador);
}

echo "\n------------------------------------------\n\n";

// --- OPERAÇÃO 2: Exportar para XML ---
// Note que para adicionar esta nova funcionalidade, não alteramos NADA
// nas classes Cafeteria ou Livraria. Apenas criamos um novo Visitor.
echo "--- Executando o Exportar XML Visitor ---\n";
$exportador = new ExportarXMLVisitor();
foreach ($estabelecimentos as $estabelecimento) {
    $estabelecimento->accept($exportador);
}