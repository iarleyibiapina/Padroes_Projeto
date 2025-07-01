<?php

interface RespostaAdaptee
{
    public function response(ClasseAntiga $classeAntiga): ClasseNova;
}
// Se eu adicionar mais classes "Adaptadoras" o padrao deixa de ser um 'Adapter' e parte 
// para o 'Strategy'.

class ClasseAntiga
{
    public array $amostra = ["um","dois","tres"];
}

class ClasseNova
{
    public function __construct(
        public string $um,
        public string $dois,
        public string $tres,
    ) {
    }
}
// Obrigatoriamente precisa pegar classe antiga/alvo para ajustar ao response
class Adapter implements RespostaAdaptee
{
    public function response(ClasseAntiga $classeAntiga): ClasseNova
    {
        return new ClasseNova(
            $classeAntiga->amostra[0],
            $classeAntiga->amostra[1],
            $classeAntiga->amostra[2]
        );
    }
}

// Versao do Livro GOF
interface RespostaAdapteeGOF
{
    public function response(): ClasseNova;
}
class AdapterGOF implements RespostaAdapteeGOF
{
    // desse meio o adapter pode ir chamando metodos 
    // e ir modificando adaptee (classe antiga) 
    public function __construct(private ClasseAntiga $adaptee)
    {
    }

    public function response(): ClasseNova // O parâmetro sai daqui
    {
        // Usa a instância guardada em $this->adaptee
        return new ClasseNova(
            $this->adaptee->amostra[0],
            $this->adaptee->amostra[1],
            $this->adaptee->amostra[2],
        );
    }
}

$classeAntiga = new ClasseAntiga();
$adaptador    = new Adapter();
$classeNova   = $adaptador->response($classeAntiga);

$adaptadorGOF = new AdapterGOF(new ClasseAntiga());
$classeNovaGOF = $adaptadorGOF->response();

// Se a classe antiga ou nova mudar, o adaptador precisa alterar mas sem afetar ambos 

die(var_dump($classeAntiga, $classeNova, $classeNovaGOF));