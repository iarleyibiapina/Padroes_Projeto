<?php

// criacionais - cap-3

namespace Iarley\Designpattern\Venda;

use DateTimeImmutable;

abstract class Venda
{
    // pode ser uma venda de produto ou serviço
    public function __construct(public DateTimeImmutable $dataRealizacao) {}
}
