<?php

// Estruturais - cap-1

namespace Iarley\Designpattern\Adapters;

class CurlHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, $data);
        curl_exec($curl);
    }
}
