<?php

// cria e configura o comando
// cria instancia do comando concreto e fornece a referencia ao receiver
// entrega o objeto de comando ao invoker

// Meu controle, recebe N comandos, que interagem sobre N receptores

require_once __DIR__ . "/Interface/ComandoInterface.php";
require_once __DIR__ . "/Receiver/Lampada.php";
require_once __DIR__ . "/Invoker/Controle.php";
require_once __DIR__ . "/Commands/ComandoPadrao.php";
require_once __DIR__ . "/Commands/VolumeComando.php";

$ReceptorLampada = new Lampada();
$ComandoPadrao   = new ComandoPadrao($ReceptorLampada);
$Controle        = new Controle();
// $Controle->setCommand() // alterando o comando no mesmo receptor
// ou 
// definindo um outro comando com outro receptor (lamparina)

echo "Chamando por meio do controle, sob o comando padrao para a Lampada\n";
$Controle->pressionarBotao(); // ligando sob o comando padrao e lampada
$Controle->pressionarBotaoVoltar(); // ligando sob o comando padrao e lampada
echo "\n";

echo "Chamando por meio do controle, sob o comando do volume para a Lampada\n";
$Controle->setCommand(new VolumeComando($ReceptorLampada));
// !evidencia um nome correto para os metodos, serem mais generalistas
$Controle->pressionarBotao();
// deve aumentar o volume
echo $ReceptorLampada->volume;
echo "\n";


// Possivel alterar o controle para receber um array de comando, segmentado por 
// uma chave que referencia o comando, assim eu posso chamar o metodo executar e 
// passar a chave pelo parametro executando o comando definido.
// ? ps: criar metodo 'adicionarComando' para adicionar a esta lista