<?php

// Eu vou usar a promocao (que pode ser mensal ou x periodo)
//  e essa promoção usa estrategias (especificas) para se comportar em cada periodo

require_once __DIR__ . "/Abstract/DescontoInterface.php";
require_once __DIR__ . "/Abstract/AbstractPromocao.php";
require_once __DIR__ . "/Class/BlackFriday.php";
require_once __DIR__ . "/Promocoes/CupomA.php";
require_once __DIR__ . "/Promocoes/CupomB.php";

echo "iniciando a promocao blackfriday ja aplicando o desconto padrao\n";
$comercio = new BlackFriday(new CupomA()); // cria a promocao
$valorProduto = 101;
// define a estrategia para esta promocao
echo "valor original: $valorProduto\n";

$valorComCupomA = $comercio->conta($valorProduto);
echo "novo valor com cupomA: $valorComCupomA\n";
$comercio->setStrategy(new CupomB()); // alterando a estrategia

$valorComCupomB = $comercio->conta($valorProduto);
echo "novo valor com cupomA: $valorComCupomB\n";