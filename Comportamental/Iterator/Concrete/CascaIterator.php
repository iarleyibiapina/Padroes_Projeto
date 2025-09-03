<?php

class CascaIterator
{
    public function __construct(
        public $id,
        public $nome,
        public $email,
        public $idade,
        public $ativo,
    ) {}
}
