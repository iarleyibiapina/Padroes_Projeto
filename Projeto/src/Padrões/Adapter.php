<?php

// Estruturais - cap-1

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Adapters\CurlHttpAdapter;
use Iarley\Designpattern\Adapters\ReactPHPHttpAdapter;
use Iarley\Designpattern\Registro\Orcamento;

class Adapter
{
    // exemplo aula

    public function execute()
    {
        // utilizando um adapter
        // adiciono o adaptador
        $registroOrcamento = new Orcamento(new CurlHttpAdapter());
        // alterando o adaptador facilmente
        // $registroOrcamento = new Orcamento(new ReactPHPHttpAdapter());
        $registroOrcamento->registrar(new \Iarley\Designpattern\Orcamento(100));
        echo "Adaptacao feita";
    }
}

// outro exemplo:
// Interface alvo que define a operação que o cliente espera usar
// interface Target {
//     public function request(): string;
// }

// Classe adaptada que o cliente não pode usar diretamente
// class Adaptee {
//     public function specificRequest(): string {
//         return "Request específica do Adaptee.";
//     }
// }

// Adaptador que faz a ponte entre o cliente e o Adaptee
// class Adapterr implements Target {
//     private $adaptee;

//     public function __construct(Adaptee $adaptee) {
//         $this->adaptee = $adaptee;
//     }

//     public function request(): string {
//         return "Adapterr: " . $this->adaptee->specificRequest();
//     }
// }

// Exemplo de uso
// $adaptee = new Adaptee();
// $adapter = new Adapterr($adaptee);
// echo $adapter->request();

