<?php

// Usa o flyweight por meio da fabrica

// a uniao dos estados pode ser feita aqui ou por meio de uma classe.

// explorando um cenario de enderecos
    // o que varia é o cliente (extrinseco)
    // o endereco se mantem (intriseco)

// 
require_once __DIR__ . "/Factories/EnderecoFactory.php";
$factory = new EnderecoFactory();

$rua1 = $factory->makeRua([
    "Rua"
]);
$rua1->entrega("jao"); // este endereco envia para esta pessoa

$rua2 = $factory->makeAvenida([
    "Avenida"
]);
$rua2->entrega("maria");

$rua3 = $factory->makeRua([
    "Rua"
]); // mesmo estado ja criado entao vai reusar o existente
$rua3->entrega("miguel"); // este endereco envia para esta outra pessoa

// ver flyweights criados
$factory->getFlyweights();

if($rua1 === $rua3){
    echo "\n";
    echo "Endereco 1 e 3: Utilizando o mesmo endereco flyweight mas para clientes diferentes";
}

