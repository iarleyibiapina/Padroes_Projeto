<?php

// Em alguns cenarios o composite tambem é utilizado em validacoes, aninhando elas.
// onde eu faço um composite para adicionar validacoes às que existem.


abstract class ValidationComponent
{
    abstract public function validate(mixed $value): bool;
}

// classes folhas
class ValidateEmail extends ValidationComponent
{
    public function validate(mixed $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}

class ValidateString extends ValidationComponent
{
    public function validate(mixed $value): bool
    {
        return gettype($value) === "string";
    }
}
// ...


class ValidationComposite extends ValidationComponent
{
    /**
     * @var array[ValidationComponent]
     */
    private array $childrens = [];

    /**
     * @param array[String] $validationComposite
     */
    public function __construct(array $validationComposite) 
    {
        foreach ($validationComposite as $validate) {
            $ValidationComponent = "Validate".$validate;
            $this->childrens[] = new $ValidationComponent();
        }
        // $this->childrens = $validationComposite;    
    }

    public function validate(mixed $value): bool
    {
        // se alguma falhar, ja para o processo como o todo
        foreach ($this->childrens as $children) {
            (bool) $validated = $children->validate($value);
            if(!$validated) return false;
        }
        return true;
    }
}

// Cliente 

// $validaUm = new ValidationComposite([
//     new ValidateString(),
//     new ValidateEmail()
// ]); // primeira implementacao
$validaUm = new ValidationComposite(["String","Email"]); // segunda implementacao
die(var_dump($validaUm->validate("teste@teste.com"))); // trabalhar em uma classe melhor caso falso.