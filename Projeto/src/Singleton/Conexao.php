<?php

// criacional - cap-6

namespace Iarley\Designpattern\Singleton;

use PDO;

// por que extender de pdo? para controlar a instancia de pdo, e como ela gerencia isso
// tambem herda os metodos do pdo para manipulação de uma unica instancia.
class Conexao extends PDO
{
    // O caso mais comum de usar singleton na conexao com o banco é sobre o desperdicio 
    // de recurso, onde é criado varias instancias.  

    // limitando instancias, preciso impedir o uso do 'new' e para fazer isso é preciso 
    // trasnformar o construtor em privado, sobrescrevendo ele
    // o construtor so vai ser acessado via outro metodo na qual vai verificar se a classe
    // ja esta instanciada ou não

    private static ?self $instance = null; // variavel estatico onde o tipo é a propria classe
    
    private function __construct(string $dsn, string $username = null, string $password = null, array $options = null)
    {

        parent::__construct($dsn, $username, $password, $options);
    }
    
    public static function getConnection(string $dsn, string $username = null, string $password = null, array $options = null): PDO
    {
        // se esta instancia vazia, vou criar uma instancia da propria classe (por conta do new static())
        if(is_null(self::$instance)) self::$instance = new static($dsn, $username, $password, $options);
        return self::$instance;
    }    

    // entao o que antes era new Pdo();
    // agora é Conexao::getConnection();
}
