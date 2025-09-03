<?php
require_once __DIR__ . "/Interfaces/Observable.php";
require_once __DIR__ . "/Interfaces/Observer.php";
require_once __DIR__ . "/Concrete/ConcreteAlphaObserver.php";
require_once __DIR__ . "/Concrete/ConcreteBetaObserver.php";
require_once __DIR__ . "/Concrete/ConcreteObservable.php";

// cria observer em X estado
$obAlpha = new ConcreteAlphaObserver();
$obBeta = new ConcreteBetaObserver();
// 
echo "\nVerificando estado inicial\n";
var_dump($obAlpha->aviso,$obBeta->aviso);
// 
// inscreve observer em Y observable
$observable = new ConcreteObservable();
$observable->subscribe($obAlpha, $obBeta);
// 
// apos determinado evento, Y executa a notificacao
// atualiza estado dos observers inscritos
$observable->notify();
// 
echo "\nVerificando estado final\n";
var_dump($obAlpha->aviso,$obBeta->aviso);
// 
// retirando um observer
$observable->unsubscribe($obBeta);
// verificando
$observable->notify();