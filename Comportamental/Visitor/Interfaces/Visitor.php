<?php

// Um visitante tera uma logica especifica para cada elemento
interface Visitor
{
    public function visitCafeteria(Cafeteria $cafeteria): void; 
    public function visitLivraria(Livraria $livraria): void;
}
