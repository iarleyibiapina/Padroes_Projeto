<?php

// Resumidamente, preciso dessa estrutura:
// Preciso da interface da abstracao
    // implementacao da abstracao

// Classes que possuem atributo da abstracao
    // Classe refinada de 'Classe'

//======================================================
// Implentações:
interface MaterialImplementacao
{
    public function getAtt1(): string;
    public function getAtt2(): bool;
    public function toggleAtt2(): void;
}

class Tijolo implements MaterialImplementacao
{
    protected string $Att1 = "tijolo";
    protected bool $Att2 = false;
    
    public function getAtt1(): string
    {   
        return $this->Att1;
    }
    public function getAtt2(): bool
    {   
        return $this->Att2;
    }
    public function toggleAtt2(): void
    {
        $this->Att2 = !$this->Att2;
    }
}

class Linha implements MaterialImplementacao
{
    protected string $Att1 = "linha";
    public bool $Att2 = true;
    
    public function getAtt1(): string
    {   
        return $this->Att1;
    }
    public function getAtt2(): bool
    {   
        return $this->Att2;
    }
    public function toggleAtt2(): void
    {
        $this->Att2 = !$this->Att2;
    }
}


//======================================================
// Abstracoes:
    // possui ligacao com implementacao
class Campo 
{
    public function __construct(protected readonly MaterialImplementacao $material) { 
    }
    public function material(): MaterialImplementacao
    {
        return $this->material;
    }

    public function funcaoCampo()
    {
        return "funcao do campo";
    }
}

class InteriorRefinado extends Campo
{
    public function funcaoInterior()
    {
        return $this->funcaoCampo() . " refinado interior";
    }
}

//=====================================================

// Cliente

$campoComTijolo = new Campo(new Tijolo());
$campoComLinha  = new Campo(new Linha());
// 
$interiorComTijolo = new InteriorRefinado(new Tijolo());
$interiorComLinha = new InteriorRefinado(new Linha());

$r1 = [
    $campoComTijolo->material()->getAtt1(),
    $campoComTijolo->material()->toggleAtt2(),
    $campoComTijolo->material()->getAtt2(),
    $campoComTijolo->funcaoCampo()
];
$r2 = [
    $campoComLinha->material()->getAtt1(),
    $campoComLinha->material()->toggleAtt2(),
    $campoComLinha->material()->getAtt2(),
    $campoComLinha->funcaoCampo()
];
$r3 = [
    $interiorComTijolo->material()->getAtt1(),
    $interiorComTijolo->material()->toggleAtt2(),
    $interiorComTijolo->material()->getAtt2(),
    $interiorComTijolo->funcaoCampo(),
    $interiorComTijolo->funcaoInterior() // extra da implementacao
];
$r4 = [
    $interiorComLinha->material()->getAtt1(),
    $interiorComLinha->material()->toggleAtt2(),
    $interiorComLinha->material()->getAtt2(),
    $interiorComLinha->funcaoCampo(),
    $interiorComLinha->funcaoInterior() // extra da implementacao
];

die(var_dump($r3, $r4));
