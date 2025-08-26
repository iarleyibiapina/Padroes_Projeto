Comando / Solicitacao

Encapsula uma solicitação como objeto, onde o cliente pode ter diferentes 
solicitações, de maneira enfileiradas e que podem ser desfeitas.

Uma determinada classe/metodo pode trocar seu comando de maneira flexivel.

- Transforma o comando em um objeto com toda a informaçao necessaria para a 
    sua execução.
- Versao orientada a objetos para funcções de callback
- É possivel criar comando composto
- Desacopla o objeto que recebe com o objeto que envia
- Usa composição ao invés de herança        
- Acoes podem ser feitas e desfeitas
- Comando são objetos, portanto podem fazer o que um objeto normal faz

Interface Comando 

Invocador (envia o comando ao receptor)(pode estar associado a um ou mais comandos)(chama a operacao)
ConcreceteComando (recebe um receptor se o comando for muito complexo,
    executa a ação/lógica que o comando irá executar)
Receptor (cada receptor possui um comportamento diferente para o comando)
    (sabe como executar)

Ex.:
    Comando (Play, Pause)
    Invocador (Controle)
    Recptor (Dvd, Televisao)