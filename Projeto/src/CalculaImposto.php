<?php

namespace Iarley\Designpattern;
use Iarley\Designpattern\Interface\Impostos;

// esta classe pode ser considerada uma classe de serviço
// Classe Contexto
class CalculaImposto
{
    // 1
    // contexto: esta funcao pode trazer varios calculos de porcentagem de imposto
    // para uso de valores, usar Ds\Map para ter maior precisao.
    public function calcula1(Orcamento $orcamento, string $tipo): float 
    {
        // php8.2 trocar para match

        // problemas:
        // - provavel surga alguma regra de negocio diferente com calculo diferente que vai alterar
        // a classe
        // - sempre que surgir um novo imposto é preciso adicionar aqui.
        switch($tipo){
            case 'ICMS':
                return $orcamento->valor * 0.1;
            case 'ISS':
                return $orcamento->valor * 0.02;
            default:
                return $orcamento->valor; 
        }
    }

    // 2

    // quando uma interface é posta como um tipo, eu defino que ela espera uma classe
    // que justamente implementa este tipo
    public function calcula2(Orcamento $orcamento, Impostos $impostos): float 
    {
        return $impostos->calcula($orcamento);
    }
}
