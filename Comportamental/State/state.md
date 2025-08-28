# Padrão de Projeto: State (Exemplo em PHP)

> O objetivo é permitir que um objeto altere seu comportamento quando seu estado interno muda.

Este padrão ajuda a organizar lógicas complexas que dependem do estado de um objeto, trazendo mais clareza e flexibilidade ao código.

### Casos de Uso e Vantagens

- Ajuda a eliminar `if/else` e `switch` grandes ou complexos.
- Ideal para cenários onde um objeto se comporta de maneira diferente para cada estado.
- Facilita a criação de novos estados, se necessário (com a exceção da necessidade de implementar a lógica de novos métodos nos estados já existentes).

---

### Como Funciona em PHP

A estrutura do padrão State se baseia em uma **Interface** de Estado, **Classes de Estado Concretas** e a classe de **Contexto**.

1.  A **Interface de Estado** define os métodos que todas as classes de estado devem implementar.
2.  Cada **Estado Concreto** implementa a interface e contém a lógica específica para um estado, incluindo as regras para transição.
3.  O **Contexto** (objeto principal) mantém uma referência ao estado atual e delega as ações para ele.

#### Exemplo da Estrutura em PHP

**1. Interface do Estado**
Define o contrato que todos os estados devem seguir.

```php
<?php

interface Estado
{
    public function alterarParaEstadoUm(Principal $contexto): void;
    public function alterarParaEstadoDois(Principal $contexto): void;
    public function alterarParaEstadoTres(Principal $contexto): void;
}
```

**2. Classe de Contexto (Principal)**
Esta classe mantém uma referência ao objeto de estado atual e permite que ele seja alterado.

```php
<?php

class Principal
{
    private Estado $estado_atual;

    public function __construct()
    {
        // Define o estado inicial padrão
        $this->estado_atual = new EstadoUm();
        echo "Estado inicial: EstadoUm\n";
    }

    // Método para permitir que os estados alterem o estado do contexto.
    public function transicaoPara(Estado $novo_estado): void
    {
        $this->estado_atual = $novo_estado;
        echo "Contexto: Transição para " . get_class($novo_estado) . "\n";
    }

    // O contexto delega as ações para o objeto de estado atual.
    public function metodoQueAlteraEstadoUm(): void
    {
        $this->estado_atual->alterarParaEstadoUm($this);
    }

    public function metodoQueAlteraEstadoDois(): void
    {
        $this->estado_atual->alterarParaEstadoDois($this);
    }

    public function metodoQueAlteraEstadoTres(): void
    {
        $this->estado_atual->alterarParaEstadoTres($this);
    }
}
```

**3. Classes de Estado Concretas**
Cada classe implementa a lógica de um estado específico.

*Classe EstadoUm:*
```php
<?php

class EstadoUm implements Estado
{
    public function alterarParaEstadoUm(Principal $contexto): void
    {
        echo "EstadoUm: Já estou no Estado Um.\n";
    }

    public function alterarParaEstadoDois(Principal $contexto): void
    {
        echo "EstadoUm: Alterando para EstadoDois...\n";
        $contexto->transicaoPara(new EstadoDois());
    }

    public function alterarParaEstadoTres(Principal $contexto): void
    {
        echo "EstadoUm: Alterando para EstadoTres...\n";
        $contexto->transicaoPara(new EstadoTres());
    }
}
```

*Classe EstadoDois:*
```php
<?php

class EstadoDois implements Estado
{
    public function alterarParaEstadoUm(Principal $contexto): void
    {
        echo "EstadoDois: Alterando para EstadoUm...\n";
        $contexto->transicaoPara(new EstadoUm());
    }

    public function alterarParaEstadoDois(Principal $contexto): void
    {
        echo "EstadoDois: Já estou no Estado Dois.\n";
    }

    public function alterarParaEstadoTres(Principal $contexto): void
    {
        echo "EstadoDois: Alterando para EstadoTres...\n";
        $contexto->transicaoPara(new EstadoTres());
    }
}
```

*Classe EstadoTrês:*
```php
<?php

class EstadoTres implements Estado
{
    public function alterarParaEstadoUm(Principal $contexto): void
    {
        echo "EstadoTres: Alterando para EstadoUm...\n";
        $contexto->transicaoPara(new EstadoUm());
    }

    public function alterarParaEstadoDois(Principal $contexto): void
    {
        echo "EstadoTres: Alterando para EstadoDois...\n";
        $contexto->transicaoPara(new EstadoDois());
    }

    public function alterarParaEstadoTres(Principal $contexto): void
    {
        echo "EstadoTres: Já estou no Estado Três.\n";
    }
}
```

**4. Exemplo de Uso**

```php
<?php

// (Incluir todas as classes definidas acima: Estado, Principal, EstadoUm, EstadoDois, EstadoTres)

$contexto = new Principal(); // Inicia em EstadoUm

echo "\n";
$contexto->metodoQueAlteraEstadoDois(); // Transição para EstadoDois
$contexto->metodoQueAlteraEstadoTres(); // Transição para EstadoTres
$contexto->metodoQueAlteraEstadoTres(); // Nenhuma transição
$contexto->metodoQueAlteraEstadoUm();  // Transição para EstadoUm

/*
Saída esperada:

Estado inicial: EstadoUm

EstadoUm: Alterando para EstadoDois...
Contexto: Transição para EstadoDois
EstadoDois: Alterando para EstadoTres...
Contexto: Transição para EstadoTres
EstadoTres: Já estou no Estado Três.
EstadoTres: Alterando para EstadoUm...
Contexto: Transição para EstadoUm
*/
```

---

### Prós e Contras

#### Prós:
-   **API Clara e Expressiva:** O código se torna muito legível e explícito.
-   **Encapsulamento Forte:** As regras de transição ficam contidas dentro das classes de estado, permitindo ou proibindo transições e evitando estados inválidos.
-   **Princípio da Responsabilidade Única (SRP):** Cada estado tem sua própria classe, isolando as responsabilidades.

#### Contras:
-   **Aumento do Número de Classes:** O padrão pode introduzir muitas classes novas no projeto, o que pode ser excessivo para máquinas de estado simples.
-   **Interface Potencialmente Grande:** Se a interface de `Estado` tiver muitos métodos, todas as classes concretas precisarão implementá-los, mesmo que em alguns casos a implementação não faça nada ou apenas retorne um erro.