<?php

// Estruturais - cap-1

namespace Iarley\Designpattern\Adapters;

class ReactPHPHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        // instancia o react php
        // prepara os dados
        // faz requisixao
        echo "ReactPHPHttpAdapter";
    }
}
