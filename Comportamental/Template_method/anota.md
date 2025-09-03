Define um conjunto de metodos a serem executados em uma determinada ordem, podendo delegar alguns
passos para as subclasses

Define um "esqueleto" de um algoritmo em uma classe base e permite que as subclasses redefinam
certos passoss sem alterar a estrutura geral do algoritmo.

Template Method: 
    passo1
    passo2
    passo3
    passo4
    ... infinitos metodos

Esse padrao permite definir alguns metodos como abstratos, deixando as subclasses implementarem
da forma que for necessário e por fim deve ter um metodo onde executa todos os metodos
seguindo uma ordem fixa.

para isso, o metodo final DEVE ser FINAL, para nao haver uma sobrescrita

abstract metodo1, para subclasses
final method, executando cada metodo harded coded e na sua ordem correta

Bom:
    -Evita duplicação de codigo
    -Fácil alteraçao de algoritmos
Ruim:
    -Em alguns casos pode alterar o comportamento de metodos nas subclasses