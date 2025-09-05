<?php

// criacional - cap-4

namespace Iarley\Designpattern\Padrões;

use DateTime;
use Iarley\Designpattern\Composite\ItemOrcamento;
use Iarley\Designpattern\NotaFiscal\NotaFiscalBuilder;
use Iarley\Designpattern\NotaFiscal\NotaFiscalExemplo;
use Iarley\Designpattern\NotaFiscal\NotaFiscalProdutoBuilder;
use Iarley\Designpattern\NotaFiscal\NotaFiscalServicoBuilder;

class Builder
{
    public function execute1()
    {
        return new NotaFiscalExemplo(
            '12.345.678/0001-90', // CNPJ
            'Razão Social Exemplo Ltda', // Razão Social
            ['item1', 'item2'], // Itens
            'Observações sobre a empresa.', // Observações
            new DateTime('2024-10-10'), // Data de Emissão
            1500.75 // Valor dos Impostos
        );
    }
    // 
    public function execute2()
    {
        $builder = new NotaFiscalBuilder();
        $builder->paraEmpresa('x','y');
        $builder->comItemOrcamento(new ItemOrcamento(1,100));
        $builder->comItemOrcamento(new ItemOrcamento(1,100));
        $builder->comItemOrcamento(new ItemOrcamento(1,100));
        $builder->comItemAleatorio("frase");
        $builder->comObservacoes('z');
        return $builder->constroi();
    }

    public function execute3()
    {
        // FLUENT INTERFACE
        return (new NotaFiscalBuilder())
            ->paraEmpresa('x','y')
            ->comItemAleatorio(2)
            ->constroi(); 
    }

    // aplicando com imposto no produto
    public function execute4()
    {
        return (new NotaFiscalProdutoBuilder())
            ->paraEmpresa('x','y')
            ->comItemAleatorio(10)
            ->comItemAleatorio(10)
            ->constroi(); 
    }
    // aplicando com imposto no servico
    public function execute5()
    {
        return (new NotaFiscalServicoBuilder())
            ->paraEmpresa('builderS','servico')
            ->comItemAleatorio(10)
            ->comItemAleatorio(10)
            ->constroi(); 
    }
}
