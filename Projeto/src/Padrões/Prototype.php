<?php

// criacionais - cap-5

namespace Iarley\Designpattern\Padrões;

use Iarley\Designpattern\Prototype\NotaFiscalPrototype;

class Prototype
{
    public function execute1()
    {
        $exemplo = new NotaFiscalPrototype(
            '12.345.678/0001-95',
            'Empresa Exemplo LTDA',
            ['Item 1', 'Item 2'],
            'Observações sobre a nota fiscal',
            new \DateTime('2024-10-10'),
            150.00
        );
        echo (string) "Razao classe original 1 " . $exemplo->razaoSocialEmpresa . PHP_EOL;
        $clone = $exemplo->clonar();
        echo (string) "Razao classe clone 2 " . $clone->razaoSocialEmpresa;
        $clone->razaoSocialEmpresa = "Novo nome objeto clone";
        echo PHP_EOL ;
        echo (string) "Razao classe original 1 " . $clone->razaoSocialEmpresa . PHP_EOL;
        echo (string) "Razao classe clone 2 alterado " . $clone->razaoSocialEmpresa . PHP_EOL;
    } 

    public function execute2()
    {
        // executando funcao nativa
        $exemplo = new NotaFiscalPrototype(
            '12.345.678/0001-95',
            'Empresa Exemplo LTDA',
            ['Item 1', 'Item 2'],
            'Observações sobre a nota fiscal',
            new \DateTime('2024-10-10'),
            150.00
        );
        echo (string) "Razao classe original 1 " . $exemplo->razaoSocialEmpresa . PHP_EOL;
        echo (string) "Data classe original 1 " . $exemplo->dataEmissao->format('h-i-s:u') . PHP_EOL;
        $clone = $exemplo->clonar();
        echo (string) "Razao classe clone 2 " . $clone->razaoSocialEmpresa;
        echo (string) "Data classe clone 2 " . $clone->dataEmissao->format('h-i-s:u') . PHP_EOL;
        $clone->razaoSocialEmpresa = "Novo nome objeto clone";
        echo PHP_EOL ;
        echo (string) "Razao classe original 1 " . $clone->razaoSocialEmpresa . PHP_EOL;
        echo (string) "Razao classe clone 2 alterado " . $clone->razaoSocialEmpresa . PHP_EOL;
    }
}
