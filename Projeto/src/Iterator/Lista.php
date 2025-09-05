<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Iterator\ListaOrcamentos;

// Lista de orcamentos
//============================================================================
$orc1 = new Orcamento(700);
$orc1->aprova();
$orc1->quantidadeItems = 9;
//============================================================================
$orc2 = new Orcamento(1200);
$orc2->aprova();
$orc2->quantidadeItems = 15;
//============================================================================
$orc3 = new Orcamento(900);
$orc3->aprova();
$orc3->quantidadeItems = 4;
//============================================================================

$listaDeOrcamentos = [
    $orc1,
    $orc2,
    $orc3
];

// Iterando sobre cada item, de forma direta.
// porem este foreach esta 'preparado' para acionar metodos da classe Orcamento
// se eu passar uma string no array, ele vai quebrar pois vai executar um metodo
// nao esperado.
foreach($listaDeOrcamentos as $orcamento){
    /** @var Orcamento $orcamento */
    echo $orcamento->valor . PHP_EOL;
    echo get_class($orcamento->estadoAtual) . PHP_EOL; // estado definido por uma classe
    echo $orcamento->quantidadeItems . PHP_EOL;
}

// entao é criado uma classe que representa uma lista de orcamentos
// ou uma coleção de orcamentos

//================================================================
// agora irei utilizar minha lista de orcamentos
$novaListaOrcamentos = new ListaOrcamentos();
$novaListaOrcamentos->addOrcamento($orc1);
$novaListaOrcamentos->addOrcamento($orc2);
$novaListaOrcamentos->addOrcamento($orc3);

// posso usar o metodo direto
// foreach($novaListaOrcamentos->orcamentos() as $orcamento){
// ou 'tentar' fazer foreach direto, mas como é um objeto eu nao consigo fazer isto 
// diretamente
// o padrao iterator, faz com o que o objeto seja capaz de ser iterado e nao precisar
// de um metodo para isto.
foreach($novaListaOrcamentos as $orcamento){
    /** @var Orcamento $orcamento */
    echo $orcamento->valor . PHP_EOL;
    echo get_class($orcamento->estadoAtual) . PHP_EOL; // estado definido por uma classe
    echo $orcamento->quantidadeItems . PHP_EOL;
}
