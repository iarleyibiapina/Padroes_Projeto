<?php

namespace Iarley\Designpattern\Estado;

use DomainException;
use Iarley\Designpattern\Orcamento;

abstract class Estado
{
    /**
     * @param \Iarley\Designpattern\Orcamento $orcamento
     * @return float
     * @throws DomainException
     */
    abstract public function calculaDescontoExtra(Orcamento $orcamento): float;

    // define uma mensagem de erro para todos, mas se for preciso apenas sobrescreve
    // um estado

    public function aprova(Orcamento $orcamento)
    {
        throw new DomainException('nao pode ser aprovado');
    }


    public function reprova(Orcamento $orcamento)
    {
        throw new DomainException('nao pode ser reprovado');        
    }

    public function finaliza(Orcamento $orcamento)
    {
        throw new DomainException('nao pode ser finalizado');
    }
}
