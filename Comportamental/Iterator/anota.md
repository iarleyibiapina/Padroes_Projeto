
Itera sobre um elemento ou conjunto de elementos muito complexo, criando uma interface
para esta colecao.
Exemplo: Ao trocar de item, ele possui muitas dependencias ou configuraçoes com outros itens

Vantagem, o codigo cliente consegue percorrer diferentes tipos de dados, uma lista, consulta ao 
banco, etc, apenas mudando o Iterator compativel.

Diagrama:
    < < Iterator > > 
    -'Controle', interface universao para navegar por uma colecao, 
    deve possuir metodos como: next(), hasNext(), currentItem()

    < < Collection > >
    -Representa a colecao a ser iterada, pode abranger outras classes ou uma estrutura muito 
    complexa.
    -Pode ser uma estrutura de dados, 
    -Deve ter o metodo createIterator() onde trabalha como uma fabrica, criando o "controle 
    remoto" especifico e compativel com ela.

    ConcreteIterator
    -Implementa o "controle" para um tipo especifico de coleçao
    -Conhece a estrutura interna de uma ConcreteCollection e mantem o estado da iteracao

    ConcreteCollection
    -Implementacao real da colecao, armazenando os objetos

    Cliente
    -Pede à collection um iterator, depois ele usa os metodos da interface do iterator
    para percorrer os elementos sem conhecer a estrutura interna da collection

!! O php ja possui implementacoes nativas para iterar sobre classes e estruturas como o 
    IteratorAggregate (collection) e o Iterator (iterator)