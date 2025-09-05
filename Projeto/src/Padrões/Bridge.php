<?php

// estrutural - cap-2

namespace Iarley\Designpattern\Padrões;

use DateTimeImmutable;
use Iarley\Designpattern\Orcamento;
use Iarley\Designpattern\Pedido\Pedido;
use Iarley\Designpattern\Relatorio\Implementacao\ArquivoZipExportado;
use Iarley\Designpattern\Relatorio\Implementacao\ArquivoXmlExportado;
use Iarley\Designpattern\Relatorio\OrcamentoExportado;
use Iarley\Designpattern\Relatorio\PedidoExportado;

class Bridge
{
    public function executaXml()
    {
        $orc = new Orcamento(200);
        $orc->quantidadeItems = 7;

        $orcamentoExportado = new OrcamentoExportado($orc);
        $orcamentoExportadoXml = new ArquivoXmlExportado('orcamento');

        echo $orcamentoExportadoXml->salvar($orcamentoExportado);
    }

    public function executaZip()
    {
        $orc = new Orcamento(200);
        $orc->quantidadeItems = 7;
        // orcamentoo de produto ou arquivo
        $orcamentoExportado = new OrcamentoExportado($orc);
        $orcamentoExportadoXml = new ArquivoZipExportado('orcamentoZip');

        echo $orcamentoExportadoXml->salvar($orcamentoExportado);
    }

    public function executaPedidoXml()
    {
        $pedido = new Pedido();
        $pedido->nomeCliente = "oedk";
        $pedido->dataFinalizacao = new DateTimeImmutable();
        // orcamentoo de produto ou arquivo
        $orcamentoExportado = new PedidoExportado($pedido);
        $orcamentoExportadoXml = new ArquivoXmlExportado('orcamentoXml');

        echo $orcamentoExportadoXml->salvar($orcamentoExportado);
    }
}
