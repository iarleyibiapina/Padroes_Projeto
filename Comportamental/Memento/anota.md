Captura e externaliza um estado interno de um objeto de modo que possa 
posteriormente ser restaurado para este estado.

-Salva o estado de um objeto.
! O memento tambem chamado de 'caretaker' NAO pode ferir o principio do 
encapsulamento, sendo assim a classe que irá aplicar o padrao deverá ter
metodos publicos como 'save()' e 'restore()' para usar o padrao e assim
conseguir passar os dados da classe em X estado

contras:
    - pode consumir muita memoria salvando os estados do objeto e tambem do 
        tamanho deste objeto.
    - classe zeladora precisa acompanhar as mudanças da classe original 
    - dependendo da linguagem, pode ser dificultoso garantir o encapsulamento

