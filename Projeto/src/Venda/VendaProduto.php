<?php

// criacionais - cap-3

namespace Iarley\Designpattern\Venda;

use DateTimeImmutable;

class VendaProduto extends Venda
{    
    public function __construct(
        public DateTimeImmutable $dataRealizacao,
        private int $pesoProduto
    ){
        parent::__construct($dataRealizacao);
    }
}