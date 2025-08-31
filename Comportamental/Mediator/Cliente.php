<?php

// ! para nao gerar um "loop" de dependencias
// é melhor criar um setter para o objeto que precisa do mediator
// ou do objeto que o mediator usa
require_once __DIR__ . "/Interfaces/Component.php";
require_once __DIR__ . "/Interfaces/FormMediator.php";
require_once __DIR__ . "/Concretes/ConcreteColleagues.php";
require_once __DIR__ . "/Concretes/ConcreteMediator.php";



// 1. Criar o Mediador
$mediator = new AuthenticationDialog();

// 2. Criar os componentes, passando o mediador para eles
    // Cada objeto precisa de um mediator como referencia, pois pode haver 
    // varios objetos com outros mediators
$username = new UsernameInput($mediator);
$checkbox = new TermsCheckbox($mediator);
$button = new SubmitButton($mediator);

// 3. Registrar os componentes no Mediador
$mediator->setUsernameInput($username);
$mediator->setTermsCheckbox($checkbox);
$mediator->setSubmitButton($button);

echo "Estado inicial do formulário. O botão de Enviar está desabilitado.\n";
$button->click();
echo "------------------------------------------------------------\n";

echo "Ação: Usuário digita o nome.\n";
$username->type("iarley");
$button->click();
echo "------------------------------------------------------------\n";

echo "Ação: Usuário marca a caixa de termos.\n";
$checkbox->check();
$button->click();
echo "------------------------------------------------------------\n";

echo "Ação: Usuário apaga o nome.\n";
$username->type("");
$button->click();