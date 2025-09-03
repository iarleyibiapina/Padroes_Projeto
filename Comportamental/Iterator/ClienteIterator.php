<?php 

require_once __DIR__ . "/Interfaces/Iterator.php";
require_once __DIR__ . "/Interfaces/Collection.php";
require_once __DIR__ . "/Concrete/CascaIterator.php";
require_once __DIR__ . "/Concrete/ConcreteIterator.php";
require_once __DIR__ . "/Concrete/ConcreteCollection.php";

$collection = new ConcreteCollection();
$iterator = $collection->createIterator();

echo "Primeiro item\n";
var_dump($iterator->first());
echo "\n";


echo "Proximo item\n";
var_dump($iterator->nextt());
echo "\n";


echo "Item atual\n";
$iterator->nextt();
var_dump($iterator->currentItem());
echo "\n";


echo "\n";
echo "Voltando um item\n";
var_dump($iterator->previouss());
echo "\n";


echo "Proximo item nao existente\n";
$iterator->nextt();
$iterator->nextt();
$iterator->nextt();
var_dump($iterator->nextt());
echo "\n";


echo "\n";
echo "Verificando se há proximo item\n";
var_dump($iterator->hasNext());
echo "\n";


echo "Resetando indice\n";
$iterator->reset();
var_dump($iterator->currentItem());
echo "\n";


echo "Tamanho total da colecao\n";
var_dump($iterator->length());
echo "\n";


echo "Posicao do indice atual\n";
var_dump($iterator->key());
var_dump($iterator->currentItem());
echo "\n";
