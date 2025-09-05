<?php
/*
interface Iterator
estende de Trsaversable (faz com o que objetos sejam iteraveis)

possui 5 metodos sendo eles:
public current(): mixed - retorna o elemento atual
public key(): mixed - retorna a chave do elemento atual
public next(): void - move para o proximo
public rewind(): void - retrocede o iterator para o primeiro elemento
public valid(): bool - verifica se posicao atual é valida

Boa logica para uso de iterator
1. Before the first iteration of the loop, Iterator::rewind() is called.
2. Before each iteration of the loop, Iterator::valid() is called.
3a. It Iterator::valid() returns false, the loop is terminated.
3b. If Iterator::valid() returns true, Iterator::current() and
Iterator::key() are called.
4. The loop body is evaluated.
5. After each iteration of the loop, Iterator::next() is called and we repeat from step 2 above.
*/