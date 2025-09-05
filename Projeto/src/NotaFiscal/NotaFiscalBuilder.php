<?php

// criacional - cap-4

namespace Iarley\Designpattern\NotaFiscal;

use DateTimeInterface;
use Iarley\Designpattern\Composite\ItemOrcamento;

// aqui a complexidade da construção sera dividida em passos
// para facilitar a organizaçao e criaçao de classe
class NotaFiscalBuilder
{
    protected NotaFiscal $notaFiscal;
    
    public function __construct() {
        $this->notaFiscal = new NotaFiscal();
        // por padrao a data vai ser de hoje
        $this->notaFiscal->dataEmissao = new \DateTimeImmutable();
    }

    // toda a logica para gerar os atributos sera definido aqui
    public function paraEmpresa(string $cnpj, string $razaoSocial): static
    {
        $this->notaFiscal->cnpjEmpresa = $cnpj;
        $this->notaFiscal->razaoSocialEmpresa = $razaoSocial;

        // meio para usar o encadeamento, retornando a instancia
        // deste objeto
        return $this;
    }

    public function comItemOrcamento(ItemOrcamento $item)
    {
        $this->notaFiscal->itens[] = $item;
        return $this;
    }

    // posso alternar os passsos e passar outra logica aqui.
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
    
    // itens da nota é apenas um array, pode ter varios 'passos
    // ao final o metodo getResult pega o objeto gerado,
    // ele nao pode ser acessado até que todos os passos (ou alguns) 
    // sejam realizados
    public function constroi(): NotaFiscal
    {
        return $this->notaFiscal;
    }
}
