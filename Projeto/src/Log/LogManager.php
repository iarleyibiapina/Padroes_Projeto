<?php

// criacionais - cap-2

namespace Iarley\Designpattern\Log;

abstract class LogManager
{
    // existe um certo padrao de severidade
    public function log(string $severidade, string $mensagem)
    {
        /**
         * @var LoggerWriter $logWriter
         */
        // metodo fabricador
        $logWriter = $this->criarLogWritter(); // qual log writer? file ou std
        // ou qualquer outro logger que sera executado ao ser criado
        // 
        $dataHoje = date('Y/m/d');
        // 
        $mensagemFormatada = "[$dataHoje][$severidade]: $mensagem" . PHP_EOL;
        $logWriter->escreve($mensagemFormatada);
    }

    // metodo que cada logger precisa implementar onde tera sua propria 
    // logica e retornara um objeto.
    abstract public function criarLogWritter(): LoggerWriter; 
}
