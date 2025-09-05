<?php

// Estrutural - cap 1

namespace Iarley\Designpattern\Adapters;

interface HttpAdapter
{
    public function post(string $url, array $data = []): void;
}

