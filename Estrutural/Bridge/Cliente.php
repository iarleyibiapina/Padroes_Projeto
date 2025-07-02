<?php

require_once __DIR__ . '/Concretas/AbstracaoRefinada/DepositoRefinado.php';
require_once __DIR__ . '/Concretas/AbstracaoRefinada/GalpaoRefinado.php';
require_once __DIR__ . '/Concretas/Implementadores/ImplementaGrande.php';
require_once __DIR__ . '/Concretas/Implementadores/ImplementaPequeno.php';

$implementacaoGrande     = new ImplementaGrande();
$implementacaoPequena    = new ImplementaPequeno();
// posso crescer implementacoes sem afetar a abstracao refinada...

// posso crescres abstracoes refinadas sem afetar as implementacoes...
$depositoRefinadoGrande  = new DepositoRefinado($implementacaoGrande);
$depositoRefinadoPequeno = new DepositoRefinado($implementacaoPequena);

$galpaoRefinadoGrande    = new GalpaoRefinado($implementacaoGrande);
$galpaoRefinadoPequena   = new GalpaoRefinado($implementacaoPequena);

// Apenas imaginar que o bridge é um 'pivot', trazendo uma relacao [N para N] para classes

$resultadosGrande = [ 
    $depositoRefinadoGrande->abstracaoRaiz(), // minha abstracao refinada de implementacao grande possui metodo da abstracao refinada, especificos
    $depositoRefinadoGrande->refinado(), // minha abstracao refinada de implementacao grande possui metodo da abstracao global/raiz
    $depositoRefinadoGrande->implementacao()->implementacaoRaiz(), // minha abstracao refinada de implementacao grande possui metodo da implementacao especifica, a grande
    $depositoRefinadoGrande->implementacao()->getTamanho(), // minha abstracao refinada de implementacao grande possui metodo da implementacao especifica, a grande
];

$resultadosPequena = [
    $depositoRefinadoPequeno->abstracaoRaiz(), // minha abstracao refinada de implementacao pequena possui metodo da abstracao refinada, especificos
    $depositoRefinadoPequeno->refinado(), // minha abstracao refinada de implementacao pequena possui metodo da abstracao global/raiz
    $depositoRefinadoPequeno->implementacao()->implementacaoRaiz(), // minha abstracao refinada de implementacao pequena  possui metodo da implementacao especifica, a pequena
    $depositoRefinadoPequeno->implementacao()->getTamanho(), // minha abstracao refinada de implementacao pequena possui metodo da implementacao especifica, a pequena
];

$resultadosGalpaoGrande = [
    $galpaoRefinadoGrande->abstracaoRaiz(),
    $galpaoRefinadoGrande->refinado(),
    $galpaoRefinadoGrande->implementacao()->implementacaoRaiz(),
    $galpaoRefinadoGrande->implementacao()->getTamanho()
];

$resultadosGalpaoPequena = [
    $galpaoRefinadoPequena->abstracaoRaiz(),
    $galpaoRefinadoPequena->refinado(),
    $galpaoRefinadoPequena->implementacao()->implementacaoRaiz(),
    $galpaoRefinadoPequena->implementacao()->getTamanho()
];

// die(var_dump($resultadosGrande, $resultadosPequena));
die(var_dump($resultadosGalpaoGrande, $resultadosGalpaoPequena));

