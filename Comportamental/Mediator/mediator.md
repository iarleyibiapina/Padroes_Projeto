Define um objeto que encapsula como um conjunto de objetos interage entre si.
- Um objeto central que faz a mediaçaõ da comunicação entre objetos

!A comunicacao do mediator com os colleagues ocorrera via interface colleague

Diagrama:
.O mediador, é uma interafce que define o metodo de comunicação entre os 
    objetos (colleague)
.ConcreteMediator, é a classe que implementa a interface do mediador e onde
    a logica acontece.
    ..ela posssui referencia para todos os 'colleague' que gerencia
    ..recebe a mensagem de um colleague e define para onde sera enviada 

Bom:
    - desacoplamento de objetos
    - facil adiçao de novos mediadores
    - simplifica comunicacao entre objetos de N-N para 1-N
Ruim: 
    - Um mediator pode ser tornar uma classe GOD CLASS (faz tudo)s