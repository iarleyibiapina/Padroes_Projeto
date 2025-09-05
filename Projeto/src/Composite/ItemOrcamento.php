<?php

// Estrutural - cap-4

namespace Iarley\Designpattern\Composite;

use Iarley\Designpattern\Composite\Interface\Orcavel;

class ItemOrcamento implements Orcavel
{

    public function __construct(
        private int $quantidadeItems,
        private float $valor
    ) {
    }

    public function valor(): float
    {
        return $this->valor;
    }

    public function quantidade(): int
    {
        return $this->quantidadeItems;
    }
}
