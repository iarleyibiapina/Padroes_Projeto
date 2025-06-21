<?php 

/**
 * Exemplo de implementacao do padrao singleton
 */
class SingletonSimples
{
    private static ?SingletonSimples $instancia = null; // armazena referencia para a classe
    // se preciso, define outros atributos necessarios...
    private string $valorGlobal = "Este valor sera armazenado no singleton para uso global";
    private function __construct() {
      // nega o uso do 'new' e nao permite instancia direta.
    }
    /**
     * @return SingletonSimples
     */
    public static function instance(): SingletonSimples
    {
        if(! SingletonSimples::$instancia){ // ja verifica o nulo
            SingletonSimples::$instancia = new SingletonSimples(); // se nao houver referencia, instancia a classe
        }
        return SingletonSimples::$instancia;
    }
    // se preciso, define outros metodos necessarios...
    /**
     * Get the value of valorGlobal
     */
    public function getValorGlobal(): string
    {
        return $this->valorGlobal;
    }
}
// utilizando
$valorA = SingletonSimples::instance();
$valorB = SingletonSimples::instance();
// 
$mesmaInstancia = $valorA === $valorB; // deve retornar true
$valor = $valorA->getValorGlobal();
die(var_dump($mesmaInstancia, $valor)); 