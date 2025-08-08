<?php

require_once __DIR__ . "/../Abstract/EnderecoFlyweightAbstract.php";
require_once __DIR__ . "/../Class/Avenida.php";
require_once __DIR__ . "/../Class/Rua.php";

class EnderecoFactory
{
    /**
     * @var array<string, EnderecoFlyweightAbstract> O cache de locais (flyweights)
     */
    private array $flyweights = [];

    /**
     * Cria um ID único a partir dos dados do local.
     */
    private function createId(string $prefix, array $intrinsicState): string
    {
        $stateString = implode('', $intrinsicState);
        $cleanString = str_replace(' ', '', $stateString);
        return $prefix . '_' . strtolower($cleanString);
    }

   /**
     * Obtém ou cria um Flyweight do tipo Rua.
     */
    public function makeRua(array $intrinsicState): EnderecoFlyweightAbstract
    {
        $key = $this->createId('rua', $intrinsicState);
        $nomeDaRua = $intrinsicState[0]; // Pega o nome da rua do array

        if (!isset($this->flyweights[$key])) {
            echo "\n";
            echo "CACHE: Criando novo objeto para a rua '{$nomeDaRua}'.\n";
            $this->flyweights[$key] = new Rua($nomeDaRua);
        } else {
            echo "\n";
            echo "CACHE: Reutilizando objeto existente para a rua '{$nomeDaRua}'.\n";
        }
        return $this->flyweights[$key];
    }

    /**
     * Obtém ou cria um Flyweight do tipo Avenida.
     */
    public function makeAvenida(array $intrinsicState): EnderecoFlyweightAbstract
    {
        $key = $this->createId('avenida', $intrinsicState);
        $nomeDaAvenida = $intrinsicState[0]; // Pega o nome da avenida do array

        if (!isset($this->flyweights[$key])) {
            echo "\n";
            echo "CACHE: Criando novo objeto para a avenida '{$nomeDaAvenida}'.\n";
            $this->flyweights[$key] = new Avenida($nomeDaAvenida);
        } else {
            echo "\n";
            echo "CACHE: Reutilizando objeto existente para a avenida '{$nomeDaAvenida}'.\n";
        }
        return $this->flyweights[$key];
    }

    public function getFlyweights(): array
    {
        return $this->flyweights;
    }
}
