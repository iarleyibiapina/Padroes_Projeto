<?php

// criacional - cap-6

namespace Iarley\Designpattern\Padrões;
use Iarley\Designpattern\Singleton\Conexao;

class Singleton
{
    public function execute1()
    {
        // antes:
        $pdo = new \PDO('');
        $pdo2 = new \PDO('');
        var_dump($pdo, $pdo2);
        // cria 2 instancias diferentes
    }

    public function execute2()
    {
        // agora, cria apenas uma instancia
        // $pdo = new Conexao(); // nao instancia direto
        $pdo = Conexao::getConnection('sqlite::memory');
        $pdo2 = Conexao::getConnection('sqlite::memory');
        // duas conexoes, mas mesmo objeto
        var_dump($pdo, $pdo2);
    }
}
