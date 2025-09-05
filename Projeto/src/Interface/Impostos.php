<?php

namespace Iarley\Designpattern\Interface;

use Iarley\Designpattern\Orcamento;

interface Impostos
{
    public function calcula(Orcamento $orcamento): float;
}
