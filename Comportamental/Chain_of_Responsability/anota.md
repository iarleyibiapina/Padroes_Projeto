O padrao consiste em uma classe lidar com uma funcao e passar para o proximo até chegar na 
ultima classe.
Encaddeia os objetos receptores e passa a solicitação ao longo da cadeia até que um objeto a trate.

!Padrao muito utilizado com requisiçoes, HTTP por exemplo

Manipulador -> Manipulador -> Manipulador

A função é resolvida em niveis, onde se resolvida ou não passa para o proxima funcao.
    *dependendo do cenario, se resolvida retorna (validacao)
    *se nao resolvida, retorna (verificacao)

Explicação do Diagrama:
    -Handler (Manipulador abstrato)
        A interface ou classe abstrata
        define a funcao principal, 'handleRequest()' por exemplo, para processar a solicitacao
        contem uma referencia para si mesma, chamada recursiva, ligando um manipulador ao outro

    -ConcreteHandleA,ConcreteHandleB,ConcreteHandleC (Manipuladores concretos)
        São implementações reais, onde cada classe resolve a requisicao da sua maneira e tambem
        é um dos nós desse encadeamento

    -Cliente
        Inicia a cadeia, ele nao sabe qual 'Handler' ai processar, apenas recebe o retorno

Bom: 
    -Desacoplamento, onde o cliente nao sabem quem vai receber e processar
    -Flexibilidade, onde é possivel reordenar ou adicionar novos 'Handlers' dinamicamente
    -Principio da Responsabilidade unica, onde cada 'handler' processa um tipo especifico 

Ruim: 
    -A requisição é passada por toda a cadeia mas não é tratada


[Como funciona o encadeamento]
! Conceito do parent::handler()  

    SE, em um handler ele nao resoler, ele vai chamar o handler do PAI, que no caso é a abstrata
    o metodo comum da abstrata vai verificar se existe um proximo handler e executar a funcao...
    senao houver retorna. 

