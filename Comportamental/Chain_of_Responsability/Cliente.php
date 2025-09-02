<?php 

require_once __DIR__ . "/Interface/Handler.php";
require_once __DIR__ . "/Casca.php";
require_once __DIR__ . "/Handlers/NivelZeroHandler.php";
require_once __DIR__ . "/Handlers/NivelDoisHandler.php";
require_once __DIR__ . "/Handlers/NivelTresHandler.php";

$nivel = 15; // 0 5 10 99
$handler = new NivelZeroHandler(); // poderia ser uma classe "default" para so depois iniciar a cadeia
$handler->setNextHandler(new NivelDoisHandler())
        ->setNextHandler(new NivelTresHandler());
// 
echo "\nVerificando nivel 0\n";
$handler->handle(new Casca(0));
// 
echo "\nVerificando nivel 5\n";
$handler->handle(new Casca(5));
// 
echo "\nVerificando nivel 10\n";
$handler->handle(new Casca(10));
// 
echo "\nVerificando nivel 99\n";
$handler->handle(new Casca(99));