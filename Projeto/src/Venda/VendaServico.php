<?php

// criacionais - cap-3

namespace Iarley\Designpattern\Venda;

use DateTimeImmutable;

class VendaServico extends Venda
{    
    public function __construct(
        public DateTimeImmutable $dataRealizacao,
        private string $nomePrestador
    ){
        parent::__construct($dataRealizacao);
    }
}
