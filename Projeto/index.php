<?php 
use Iarley\Designpattern\FlyWeight\ConsumindoMuito;
use Iarley\Designpattern\Padrões\AbstractFactory;
use Iarley\Designpattern\Padrões\Adapter;
use Iarley\Designpattern\Padrões\Bridge;
use Iarley\Designpattern\Padrões\Builder;
use Iarley\Designpattern\Padrões\ChainOfResponsibility;
use Iarley\Designpattern\Padrões\Composite;
use Iarley\Designpattern\Padrões\Decorator;
use Iarley\Designpattern\Padrões\Facade;
use Iarley\Designpattern\Padrões\FactoryMethod;
use Iarley\Designpattern\Padrões\Prototype;
use Iarley\Designpattern\Padrões\Proxy;
use Iarley\Designpattern\Padrões\Singleton;
use Iarley\Designpattern\Padrões\State;
use Iarley\Designpattern\Padrões\Strategy;
use Iarley\Designpattern\Padrões\TemplateMethod;
use Iarley\Designpattern\Pedido\Command\GerarPedido;

require_once __DIR__ . '/vendor/autoload.php';

// (new Strategy())->execute();

// (new ChainOfResponsibility())->primeiraVersao();
// (new ChainOfResponsibility())->segundaVersao();
// (new ChainOfResponsibility())->executa();

// (new TemplateMethod())->execute();

// (new State())->executeUm();
// (new State())->executeDois();

// Command (pega variaveis da cli)
// (new GerarPedido(600, 7, "irineu"))->execute();

// Adapter
// (new Adapter())->execute();

// Bridge
// usando o formato xml
// (new Bridge)->executaXml();
// (new Bridge)->executaZip();

// Decorator
// (new Decorator())->executa();

// Composite
// (new Composite())->execute1();
// (new Composite())->execute2();

// Facade
// (new Facade())->execute();

// Proxy
// (new Proxy())->execute();

// Simulando um metodo muito pesado
// (new ConsumindoMuito)->muito();
// (new ConsumindoMuito)->separado();
// (new ConsumindoMuito)->flyweightFactory();

// Factory Method
// (new FactoryMethod)->executeFile(); // escreve no arquivo log
// (new FactoryMethod)->executeStd(); 

// Abstract Factory - fabricaçao de objetos diferentes
// (new AbstractFactory())->executeServico();
// (new AbstractFactory())->executeProduto();

// Builder
// var_dump((new Builder())->execute1()); // primeira versao
// var_dump((new Builder())->execute2()); // implementacao
// var_dump((new Builder())->execute3()); // com fluent interface
// var_dump((new Builder())->execute4()); // com imposto sobre produto
// var_dump((new Builder())->execute5()); // com imposto sobre servico

// Prototype
// (new Prototype)->execute1();
// (new Prototype)->execute2(); // usando metodo clone do php

// Singleton
(new Singleton())->execute1();
