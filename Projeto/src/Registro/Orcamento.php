<?php

// Estrutural - cap 1

namespace Iarley\Designpattern\Registro;

use Iarley\Designpattern\Adapters\HttpAdapter;
use Iarley\Designpattern\Estado\Finalizado;
use Iarley\Designpattern\Orcamento as DesignpatternOrcamento;

class Orcamento
{
    public function __construct(protected HttpAdapter $httpAdapter) {
    }

    public function registrar(DesignpatternOrcamento $orcamento)
    {
        // chama uma api de registro
        // envia o dado para armazenar.

        // existem vairas maneiras de ser fazer uma requisição
        // guzzle, get_content, curl.
        // mas este codigo deve se preocuspar somente em chamar o metodo
        // e entao deve ter outro codigo onde adapta a requisiçao para o
        // pacote correto.
        if(!$orcamento->estadoAtual instanceof Finalizado) throw new \Exception('Apenas finalizados');
        $this->httpAdapter->post('/api/orcamentos', [
            'valor'      => $orcamento->valor,
            'quantidade' => $orcamento->quantidadeItems,
        ]);
    }
}
