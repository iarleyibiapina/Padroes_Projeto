Define uma dependencia de 'um para muitos' entre objetos, de modo que, quando um objeto
muda de estado, todos os seus dependente são automaticamente notificados e atualizados.

Padrao que literal observa um comportamento de uma classe
se um determinado evento acontecer, o observer vai capturar e mudar
o estado desta classe.

! Usado em mudança de estados, logs, chamadas.
! Objetos se inscrevem em um evento que ao acontecer as classes serão notificadas.

Eu possuo:
    -um 'OBSERVAVEL', que contem varios observadores
    -varios OBSERVADOR, que pertence a um observavel ou mais

    eu 'escrevo'/registro um observador em um observavel e em determinado ponto eu envio uma 
    notificacao para todos.
    ! No caso aqui, a interface implementa o metodo 'update' mas varia de cada contexto e necessidade



Bom: 
    - Facicilita a comunicação entre objetos em tempo de execução
Ruim: 
    -Pode ser complexo ou impossível manter a ordem em que as notificações são enviadas.