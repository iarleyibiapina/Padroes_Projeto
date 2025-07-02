<?php
// futuro Cliente

//================Estrutura basica
// Abstracoes
abstract class ContextoUmAbstracao
{
    public ImplementacaoAbstracao $implementacao;

    abstract public function setImplementation(ImplementacaoAbstracao $implementacao): void;

    // interagindo com a implementacao
    public function toggleStatus()
    {
        $this->implementacao->status = !$this->implementacao->status;
    }
}
abstract class ContextoDoisAbstracao
{
    public ImplementacaoAbstracaoRefinada $implementacao;

    abstract public function setImplementation(ImplementacaoAbstracaoRefinada $implementacao): void;

    // interagindo com a implementacao ou seu metodo especifico
    public function especificoAbstracao(): string
    {
        return "metodo especifico da abstrata";
    }
}
class ImplementaConcretaAbstracao extends ContextoUmAbstracao
{
    public function __construct(public ImplementacaoAbstracao $implementacao) {
    }
    public function setImplementation(ImplementacaoAbstracao $implementacao): void
    {
        $this->implementacao = $implementacao; 
    }
}
class ImplementaConcretaAbstracaoRefinada extends ContextoDoisAbstracao
{
    public function __construct(public ImplementacaoAbstracaoRefinada $implementacao) {
    }
    public function setImplementation(ImplementacaoAbstracaoRefinada $implementacao): void
    {
        $this->implementacao = $implementacao;
    }
}
// Implementacoes
abstract class ImplementacaoAbstracao 
{
    // atributo que a abstracao ira modificar
    public bool $status = false;
    // atributos especificos
    abstract public function setStatus(bool $value);
    abstract public function status(): bool;
}

abstract class ImplementacaoAbstracaoRefinada extends ImplementacaoAbstracao
{ // implementacao mais refinada
    // atributos especificos
    public string $botao = "botao"; // novo
    abstract public function metodoEspecifico(): mixed; // novo
}
//================

//================Varias implementacoes especificas
class SituacaoCorredorSimples extends ImplementacaoAbstracao
{
    public function setStatus(bool $value)
    {
        $this->status = $value; // pode haver uma logica especifica aqui tambem
    }

    public function status(): bool
    {
        return $this->status; // pode haver uma logica especifica aqui tambem
    }

    // outros metodos/atributos especificos desta classe
    public function especificoSituacao(): string
    {
        return "metodo extra do corredor simples";
    }
}
class SituacaoCorredorAvancada extends ImplementacaoAbstracaoRefinada
{
    public function setStatus(bool $value)
    {
        $this->status = $value;
    }

    public function status(): bool
    {
        return $this->status; 
    }
    public function metodoEspecifico(): mixed
    {
        return "metodo especifico de corredor avancado";
    }
}
// ...posso ter uma familia de objetos que implementam essa abstracao
// ...com a nova implementacao eu posso alternar em meu objeto qual 
//      implementacao ele ira extender, se adicionar metodos eu modifico
//      se diminuir metodos apenas deixo o codigo com esta
class SituacaoQuartoSimples extends ImplementacaoAbstracaoRefinada
{
    public function setStatus(bool $value)
    {
        $this->status = $value; // pode haver uma logica especifica aqui tambem
    }

    public function status(): bool
    {
        return $this->status; // pode haver uma logica especifica aqui tambem
    }
    public function metodoEspecifico(): mixed
    {
        return "metodo especifico do quarto simples";
    }
}
//================Criacao das classes abstratas 

$abstracao = new ImplementaConcretaAbstracao(new SituacaoCorredorSimples()); # primeira abstracao com primeira implementacao
// $abstracao->setImplementation(new SituacaoCorredorAvancada());  # primeira abstracao com segunda implementacao
$conjunto1 = [
    $abstracao->implementacao->status,                # se corredor simples
    // $abstracao->implementacao->metodoEspecifico(), # se corredor avancado
];
// die(var_dump($conjunto1));

$abstracao = new ImplementaConcretaAbstracaoRefinada(new SituacaoQuartoSimples()); # segunda abstracao com primeira implementacao
$conjunto2 = [
    $abstracao->implementacao->status(), 
    $abstracao->implementacao->metodoEspecifico(),
    $abstracao->especificoAbstracao()
]; # segunda abstracao com segunda implementacao

die(var_dump($conjunto2));
//==================Logo posso ter quantidade variadas de Abstracoes x Implementacoes