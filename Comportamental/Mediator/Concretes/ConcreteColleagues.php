<?php
// Elementos de formulário. 
// Não sabem nada uns dos outros, 
// apenas notificam o mediador quando algo acontece com eles.

class UsernameInput extends Component
{
    private string $value = '';

    public function type(string $text): void
    {
        $this->value = $text;
        echo "UsernameInput: Digitou '{$this->value}'. Notificando mediador...\n";
        $this->mediator->notify($this, 'username_typed');
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

class TermsCheckbox extends Component
{
    private bool $isChecked = false;

    public function check(): void
    {
        $this->isChecked = !$this->isChecked;
        $status = $this->isChecked ? 'marcado' : 'desmarcado';
        echo "TermsCheckbox: Foi {$status}. Notificando mediador...\n";
        $this->mediator->notify($this, 'terms_checked');
    }

    public function isChecked(): bool
    {
        return $this->isChecked;
    }
}

class SubmitButton extends Component
{
    private bool $isEnabled = false;

    public function enable(): void
    {
        if (!$this->isEnabled) {
            $this->isEnabled = true;
            echo "SubmitButton: FOI HABILITADO.\n";
        }
    }

    public function disable(): void
    {
        if ($this->isEnabled) {
            $this->isEnabled = false;
            echo "SubmitButton: FOI DESABILITADO.\n";
        }
    }

    public function click(): void
    {
        if ($this->isEnabled) {
            echo "SubmitButton: Formulário enviado com sucesso!\n";
        } else {
            echo "SubmitButton: Clique ignorado, botão desabilitado.\n";
        }
    }
}