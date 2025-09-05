<?php

// criacional - cap-4

namespace Iarley\Designpattern\NotaFiscal;

class NotaFiscalExemplo
{
    // supondo uma classe com varios atributos ou uma quantidade maior
    // ainda em outros cenarios
    public string $cnpjEmpresa;
    public string $razaoSocialEmpresa;
    public array $itens;
    public string $observacoes;
    public \DateTimeInterface $dataEmissao;
    public float $valorImpostos;

    // porem ao iniciar um construtor, é preciso de todos estes
    // parametros, alem de ser sujo, é possivel esquecer
    // ou então sera preciso ignorar alguns parametros, mas ainda
    // sendo necessario passsar um nulo
    public function __construct(
        string $cnpjEmpresa,
        string $razaoSocialEmpresa,
        array $itens,
        string $observacoes,
        \DateTimeInterface $dataEmissao,
        float $valorImpostos
    ) {
        $this->cnpjEmpresa        = $cnpjEmpresa;
        $this->razaoSocialEmpresa = $razaoSocialEmpresa;
        $this->itens              = $itens;
        $this->observacoes        = $observacoes;
        $this->dataEmissao        = $dataEmissao;
        $this->valorImpostos      = $valorImpostos;
    }
    // ao criar a classe os atributos poderiam ser facilmente
    // esquecidos ou errado
    // $empresa = new Empresa(
    //     '12.345.678/0001-90', // CNPJ
    //     'Razão Social Exemplo Ltda', // Razão Social
    //     ['item1', 'item2'], // Itens
    //     'Observações sobre a empresa.', // Observações
    //     new DateTime('2024-10-10'), // Data de Emissão
    //     1500.75 // Valor dos Impostos
    // );

    // esta classe tambem possui varios metodos e logicas
    public function valor(): float
    {
        return 0;
    }
}
