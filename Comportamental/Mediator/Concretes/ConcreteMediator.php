<?php

// Esta é a "torre de controle". 
// Ele conhece todos os componentes e contém a lógica de como eles devem reagir uns aos outros.

// O ConcreteMediator implementa a lógica de coordenação.
// Ele reage a eventos dos componentes e gerencia a comunicação entre eles.
class AuthenticationDialog implements FormMediator
{
    private UsernameInput $usernameInput;
    private TermsCheckbox $termsCheckbox;
    private SubmitButton $submitButton;

    // Métodos para registrar os componentes que este mediador gerencia
    public function setUsernameInput(UsernameInput $input): void
    {
        $this->usernameInput = $input;
    }

    public function setTermsCheckbox(TermsCheckbox $checkbox): void
    {
        $this->termsCheckbox = $checkbox;
    }

    public function setSubmitButton(SubmitButton $button): void
    {
        $this->submitButton = $button;
    }

    // Aqui está a lógica central!
    public function notify(Component $sender, string $event): void
    {
        echo "Mediator: Recebeu notificação do evento '{$event}'. Verificando condições...\n";

        // Sempre que um dos componentes relevantes muda,
        // verificamos o estado geral do formulário.
        if ($event === 'username_typed' || $event === 'terms_checked') {
            $this->checkFormState();
        }
    }
    
    // Método privado com as regras de negócio
    private function checkFormState(): void
    {
        // REGRA: O botão só fica ativo se o username NÃO estiver vazio E o checkbox estiver marcado.
        if (!empty($this->usernameInput->getValue()) && $this->termsCheckbox->isChecked()) {
            $this->submitButton->enable();
        } else {
            $this->submitButton->disable();
        }
    }
}