<?php

// criacional - cap-4

namespace Iarley\Designpattern\NotaFiscal;

use DateTimeInterface;
use Iarley\Designpattern\Composite\ItemOrcamento;

// transformando a classe em Abstrata, pois ela é um construtor
// de notas que pode ser nota fiscal de produto ou serviço
abstract class AbstractNotaFiscalBuilder
{
    protected NotaFiscal $notaFiscal;
    
    public function __construct() {
        $this->notaFiscal = new NotaFiscal();
        $this->notaFiscal->dataEmissao = new \DateTimeImmutable();
    }

    public function paraEmpresa(string $cnpj, string $razaoSocial): static
    {
        $this->notaFiscal->cnpjEmpresa = $cnpj;
        $this->notaFiscal->razaoSocialEmpresa = $razaoSocial;

        return $this;
    }

    public function comItemOrcamentoo(ItemOrcamento $item)
    {
        $this->notaFiscal->itens[] = $item;
        return $this;
    }

    public function comItemAleatorio(string $item)
    {
        $this->notaFiscal->itens[] = $item;
        return $this;
    }

    public function comObservacoes(string $observacoes)
    {
        $this->notaFiscal->observacoes = $observacoes;
        return $this;
    }

    public function comDataEmissao(DateTimeInterface $dataEmissao)
    {
        $this->notaFiscal->dataEmissao = $dataEmissao;
        return $this;
    }
    
    abstract public function constroi(): NotaFiscal;
}
