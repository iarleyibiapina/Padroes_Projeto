<?php

// estrutural - cap-7

namespace Iarley\Designpattern\FlyWeight;

class PedidoExtrinsico
{
    public function __construct(
        private string $nomeCliente,
        private \DateTimeImmutable $dataFinalizacao
    ) {}

    public function nome(): string
    {
        return $this->nomeCliente;
    }

    public function dataFinalizacao(): \DateTimeImmutable
    {
        return $this->dataFinalizacao;
    }
}
