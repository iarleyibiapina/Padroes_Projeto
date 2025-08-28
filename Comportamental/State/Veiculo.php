<?php

class Veiculo
{
    private EstadoExemplo $estadoExemplo;
    // ! Precisa iniciar em um estado padrao
    public function __construct() {
        echo "gerando um veiculo desligado\n";
        $this->novoEstado(estadoExemplo: new Desligar());
    }
    // ! Precisa desta funcao
    public function novoEstado(EstadoExemplo $estadoExemplo)
    {
        // defino o estado NA PRINCIPAL
        $this->estadoExemplo = $estadoExemplo;
        // aqui, a principal define a si mesma como objeto referencia no 
        // estado, assim de acordo com o metodo chamado ele ira atualizar
        // na classe estado, o novo estado do PRINCIPAL
        $this->estadoExemplo->setVeiculo(veiculo: $this);
    }
    public function desligar()
    {
        $this->estadoExemplo->desligar();
    }
    public function ligar()
    {
        $this->estadoExemplo->ligar();        
    }
    public function acelerar()
    {
        $this->estadoExemplo->acelerar();
    }
}
