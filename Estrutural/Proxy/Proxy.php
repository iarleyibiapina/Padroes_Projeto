<?php 
// Um dos varios cenarios do Proxy, classificação

interface Requisicao
{
    public function requisicao(mixed $dados): mixed;
}

class ObjetoReal implements Requisicao
{
    public function requisicao(mixed $dados): mixed
    {
        return $dados * 2;
    }
}

class ProxyTipoUm implements Requisicao
{
    private int $cache = 0;
    public function __construct(protected Requisicao $objetoReal) {}

    public function requisicao(mixed $dados): mixed
    {
        // fazendo um "controle" para tipo de dado
        if(!is_numeric($dados)) throw new Exception("tipo invalido");
        // fazendo um "cache" do dado;
        if($this->cache == 0) $this->cache = $this->objetoReal->requisicao($dados);
        // acessando e chamando o metodo do objeto real
        return $this->cache;
    }
}
// 
class ProxyTipoLog implements Requisicao
{
    public function __construct(protected Requisicao $objetoReal) {}

    public function requisicao(mixed $dados): mixed
    {
        // antes de realizar uma acao, faz um log especifico

        // se dado algum tipo, faz um determinado tipo de log
        // o log pode ser especifico do framework, ou conter alguma logica para 
        // armazenar em uma X tabela ou X banco
        $caminho = __DIR__ . '/minha_aplicacao.log';
        error_log("mensagem de erro nativa do php",3,  $caminho);
        return $this->objetoReal->requisicao($dados);
    }
}
// 
class ProxyTipoAutorizacao implements Requisicao
{
    public function __construct(protected Requisicao $objetoReal) {}
    public function requisicao(mixed $dados): mixed
    {
        // antes de realizar uma acao, faz uma autorizacao
        if($dados != "usuarioX") throw new Exception("nao autorizado");
        return $this->objetoReal->requisicao(2);
    }
}
// 
class ProxyTipoServico implements Requisicao
{
    public function __construct(protected Requisicao $objetoReal) {}
    public function requisicao(mixed $dados): mixed
    {
        // proxy que faz uma certa logica ou instancia classes antes
        $this->m1();
        $this->m2();
        $this->m3();
        return $this->objetoReal->requisicao($dados);
    }
    public function m1()
    {
    }
    public function m2()
    {
    }
    public function m3()
    {
    }
}

// cliente
// pede ao proxy
// que busca no objeto real
$dadosCliente = [34, "string", "usuarioX"];
$proxy = [
    new ProxyTipoUm(new ObjetoReal()), // proxy onde faz um controle do tipo de dado
    new ProxyTipoLog(new ObjetoReal()), // proxy onde faz um log
    new ProxyTipoAutorizacao(new ObjetoReal()),
];
// 
$a = $proxy[2]->requisicao($dadosCliente[2]);
// 
// ? Extra
// encadeando proxys, fazendo a chamada em cada proxy do mais externo ao interno
$proxyEncadeado  = new ProxyTipoUm(new ObjetoReal());
$proxyEncadeado2 = new ProxyTipoLog($proxyEncadeado);
$proxyEncadeado3 = new ProxyTipoAutorizacao($proxyEncadeado2);
// aninha e executa todos os proxys
$b = $proxyEncadeado3->requisicao($dadosCliente[2]);
// 
die(var_dump($a, $b));