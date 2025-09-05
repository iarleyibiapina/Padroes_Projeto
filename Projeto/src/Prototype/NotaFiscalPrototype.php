<?php

// criacional - cap-5

namespace Iarley\Designpattern\Prototype;

use DateTime;
use DateTimeImmutable;

class NotaFiscalPrototype
{
    public function __construct(
        public string $cnpjEmpresa,
        public string $razaoSocialEmpresa,
        public array $itens,
        public string $observacoes,
        public \DateTimeInterface $dataEmissao,
        public float $valorImpostos,
    ) {}
    
    public function valor(): float
    {
        return array_reduce($this->itens, fn($acc, $cur) => $acc + $cur, 0);
    }

    // metodo para clonagem de objeto
    public function clonar(): NotaFiscalPrototype
    {
        // meio mais manual
        // $clone->itens = $this->itens;
        return new NotaFiscalPrototype(
            $this->cnpjEmpresa,
            $this->razaoSocialEmpresa,
            $this->itens,
            $this->observacoes,
             $this->dataEmissao,
            $this->valorImpostos,
        );
        // agora eu posso editar essa nova instancia 
    }

    public function clone(): NotaFiscalPrototype
    {
        // metodo nativo do php, clona esta instancia
        // tambem utiliza as mesmas referencias nos objetos
        return clone $this; 

        // se eu quiser alterar alguma logica no clone, eu apenas
        // faço a alteraçao dentro do metodo magico __clone
        // na classe.

    }
    
    // exemplo: alterando a data e pegando a data atual no clone
    // ao inves da data definida na classe referencia
    public function __clone()
    {
        // o clone vai ter a data que foi clonada
        $this->dataEmissao = new DateTime();
    }
}
