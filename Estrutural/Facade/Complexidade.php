<?php

// Subsistema 1: Gerencia o estoque
class Estoque
{
    public function verificar(string $produto): bool
    {
        echo "Verificando estoque do produto: {$produto}\n";
        // Lógica complexa para checar o banco de dados...
        return true; // Simulando que há estoque
    }
}

// Subsistema 2: Processa o pagamento
class Pagamento
{
    public function processar(string $cliente, float $valor): bool
    {
        echo "Processando pagamento de R$ {$valor} para o cliente: {$cliente}\n";
        // Lógica complexa de integração com gateway de pagamento...
        return true; // Simulando que o pagamento foi aprovado
    }
}

// Subsistema 3: Cuida da logística de envio
class Envio
{
    public function agendarEntrega(string $cliente, string $produto): void
    {
        echo "Agendando envio do produto '{$produto}' para: {$cliente}\n";
        // Lógica complexa para calcular frete, emitir etiqueta...
    }
}

// Subsistema 4: Envia notificações
class Email
{
    public function enviarConfirmacao(string $cliente): void
    {
        echo "Enviando e-mail de confirmação da compra para: {$cliente}\n";
    }
}

