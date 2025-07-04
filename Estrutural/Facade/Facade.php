<?php

require_once __DIR__ . '/Complexidade.php';

// Uma fachada para a criacao de uma classe de maneira simples

class Facade
{
    // pode utilizar metodos abstratos, exemplificando sua simplicidade
    // e forma de utilizacao em varios cenarios de codigo

    // apenas um exemplo de utilizacao
    public static function constroi(): void
    {
        // toda uma logica complexa aqui...(varias classes, outros metodos)
        // return $BuilderOne = (new ConcreteBuilderOne())
            // ->setArgs1("um")
            // ->setArgs3("tres")
            // ->setArgs4([1,"d",false,[],true,45])
            // ->build();
        echo "UAU, uma logica grande aqui";
    }

    /**
     * Soma do tamanho de cada string passada
     * @param string[] $args
     */
    public static function valores(string ...$args)
    {
        return array_reduce(
            array: func_get_args(), 
            callback: fn ($accumulador, $value): int => $accumulador += strlen($value),
            initial: 0);
    }

    public static function comprar(string $cliente, string $produto, float $valor): void
    {
        $estoque   = new Estoque();
        $pagamento = new Pagamento();
        $envio     = new Envio();
        $email     = new Email();
        // 
        echo "=========================================\n";
        echo "INICIANDO PROCESSO DE COMPRA VIA FACADE\n";
        echo "=========================================\n";

        if ($estoque->verificar($produto)) {
            if ($pagamento->processar($cliente, $valor)) {
                $envio->agendarEntrega($cliente, $produto);
                $email->enviarConfirmacao($cliente);
                echo "=========================================\n";
                echo "COMPRA FINALIZADA COM SUCESSO!\n";
                echo "=========================================\n";
            }
        }
        // complexidade por ser maior...
    }
}
echo "\n";
echo "Calculo complexo " . Facade::valores("teste","unitario");
echo "\n";
echo "\n";
Facade::comprar("João Silva", "Notebook Gamer", 5000.00);
echo "\n";
Facade::constroi();