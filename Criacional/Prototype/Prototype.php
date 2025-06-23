<?php
// utilizar em um objeto de grande configuracao
// objeto que usa muita memoria

class Base
{
    // classe grande e complexa...
    public string $nome = "Base";

    /**
     * Usando o metodo ja reservado para clonar uma classe
     * @return Base
     */
    public function copia(): Base
    {
        // pode ser aplicado uma logica aqui se necessario
        // ex: mudar o created_at
        return clone new $this;
    }
}

class BaseDois
{
    // classe grande e complexa...
    public string $nome = "Base";

    /**
     * Usando o metodo magico original
     * @return Base
     */
    public function __clone(): void
    {
        // pode ser aplicado uma logica aqui se necessario
        // ex: mudar o created_at

        // o metodo magico apenas define como a classe se comportara
        // quando for utilizar o 'clone' antes dela

        // ou seja, agora eu preciso usar o : clone BaseDois
        $this->nome .= " clonado"; 
    }
}

$base = (new Base())->copia();
$baseDois = clone (new BaseDois());
// 
die(var_dump($base, $baseDois));