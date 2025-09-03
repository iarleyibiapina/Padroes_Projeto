
> "Representa uma operação a ser executada sobre os elementos da estrutura de um objeto. O
> visitor permite que você separe um algoritmo dos elementos sobre os quais opera."

Tem como finalidade adicionar novas operações a um conjunto de classes sem precisar modificar essas classes.

  - Quando precisar executar um algoritmo em todos os elementos de uma estrutura complexa

Elementos, são a classe principal, com suas caracteristicas e dados. Eles possuem metodos
especificos onde um "especialista" pode atuar;

```php
Objeto principal(
    acaoNecessariaUm(especialistaUm)       // recebe um especialista para ESTA acao
    acaoNecessariaDois(especialistaDois)   // recebe um especialista para ESTA acao
    acaoNecessariaTres(especialistaUmTres) // recebe um especialista para ESTA acao
    // podendo adicionar mais operacao para outros especialistas
)
```

```php
Especialista(
    // precisa agora adicionar o metodo para atuar em cada elemento

    visitElementoA(elemento)
    visitElementoB(elemento)
    visitElementoC(elemento)
)
```

  - Com isso, outras classes Elementos, podem receber a "visita" de um especialista ou mais

### `< < Visitor > >`

\-Define a interface para o especialista
\-Deve ter um metodo 'visit' para cada tipo de concreto que ela pode visitar.

### `ConcreteVisitor`

  - Implementaçoes dos especialistas
  - Vai implementar a logica especifica para o metodo visit

### `< < Element > >`

  - Interface para os objetos que serão visitados
  - Exibe  um unico e fundamental método: accept(v: Visitor), permitindo o visitor interajir
    com o Element

### `ConcreteElement`

  - Classe real da estrutura
  - implementam o metodo 'accept', o elemento chama o visitante de volta passando a si mesmo
    como argumento

### `Cliente`

OjbectStructue é a colecao de objetos Element
Cria um ConcreteVisitor e usa para percorer o OjbectStructure, chamando o
element.accept(visitor) para cada um

### Bom:

  - Isola o codigo da regra de negócio
  - Separa algoritmos complexos em objetos auxiliares

### Ruim:

  - Se um novo objeto for adicionado à estrutura, é preciso atualizar os objetos auxiliares
  - Ojbetos visitantes podem nao ter acesso a todos os membros dos objetos em que operam
  - Se for preciso adicionar um novo elemento, todas as interfaces e concretas dos visitantes
    precisam ser alteradas e adicionadas para adicionar o metodo do elemento