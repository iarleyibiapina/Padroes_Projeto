<?php

// Posso ter uma Classe Abstrata definindo todas as etapas necessaria ou uma interface

// Objeto que vai ser construido (pode ser outro objeto)
// pode ter varios outros parametros
class Produto
{
    public function __construct(
        public string $args1,
        public string $args2,
        public string $args3,
        public array  $args4,
    ) {
    }
}

// Classe base do Builder
abstract class AbstractBuilder 
{
    protected string $args1 = "padrão abstrato";
    protected string $args2 = "padrão abstrato";
    protected string $args3 = "padrão abstrato";
    protected array $args4 = [];

    // Classes filhas devem sobrescrever se necessario
    public function setArgs1(string $args1): self
    {
        $this->args1 = $args1;
        return $this;
    }

    public function setArgs2(string $args2): self
    {
        $this->args2 = $args2;
        return $this;
    }

    public function setArgs3(string $args3): self
    {
        $this->args3 = $args3;
        return $this;
    }

    // Classes filhas devem implementar o Args4
    abstract public function setArgs4(mixed $values): self;

    public function build(): Produto
    {
        return new Produto(
            $this->args1,
            $this->args2,
            $this->args3,
            $this->args4
        );
    }
}
// Neste construtor, vou definir estas frases padroes e uma logica de filtrar apenas numero
class ConcreteBuilderOne extends AbstractBuilder
{
    public function __construct() {
        // Define valores padrão específicos para este builder
        $this->args1 = "tipo construtor 1";
        $this->args2 = "tipo construtor 1";
        $this->args3 = "tipo construtor 1";
    }
    /**
     * Apenas um exemplo de sobrescrita
     */
    #[Override]
    public function setArgs1(string $args1): self
    {
        $this->args1 = $args1;
        return $this;
    }
    public function setArgs4(mixed $values): self
    {
        // simulando uma logica complexa onde aceito apenas inteiros;
        foreach ($values as $value) {
            if(is_numeric($value)) $this->args4[] = $value;
        }
        return $this;
    }
}
// Construtor dois, com sua logica especifica
class ConcreteBuilderTwo extends AbstractBuilder
{
    public function __construct() {
        $this->args1 = "tipo construtor 2";
        $this->args2 = "tipo construtor 2";
        $this->args3 = "tipo construtor 2";
    }

    public function setArgs4(mixed $values): self
    {
        foreach ($values as $value) {
            if(is_bool($value)) $this->args4[] = $value;
        }
        return $this;
    }
}

// Classe DIRETOR, recebe os valores e define a ordem correta 
// da construcao, supondo que contextos diferentes exigem uma ordem de 
// inicializacao correta
// *pode seguir uma estrutura melhor se usando Herança ou Interface
class Diretor
{
    public function __construct(
        private $builder,
        private array $values
    ) {}
    public function build(): Produto
    {
        // o construtor define o Builder dinamicamente
        // 
        // define a ordem:
        // ultimo metodo primeiro
        // oculta o metodo 1 e 3
        return $this->builder 
            ->setArgs4($this->values[0]) 
            ->setArgs2($this->values[1])
            ->build();
    }
}

// Executando

/** @var ConcreteBuilderOne $Builder */
$BuilderOne = (new ConcreteBuilderOne())
    ->setArgs1("um")
    ->setArgs3("tres")
    ->setArgs4([1,"d",false,[],true,45])
    ->build();
// die(var_dump($BuilderOne));

/** @var ConcreteBuilderOne $Builder */
$BuilderTwo = (new ConcreteBuilderTwo())
    ->setArgs4([1,"d",false,[],true,45])
    ->build();
// die(var_dump($BuilderTwo));

// pode ser passado por meio da injeção de dependencia o Builder desejado
/** @var Diretor $Diretor */
$Diretor = (
    new Diretor(
    new ConcreteBuilderOne(),[
    [1,"d",[],[],true,45],
    "tres"
]))->build();
// die(var_dump($Diretor));

// Posso ter outros tipos de construtor definindo outras logicas em cada metodo ou atributo a ser passado
// para o objeto final
die(var_dump($BuilderOne, $BuilderTwo, $Diretor));