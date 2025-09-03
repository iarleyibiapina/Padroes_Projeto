<?php 

class Stringuinha extends TemplateMethod 
{
    protected function quatro(): void
    {
        $this->resultado .= "stringuinha ";
    }
    protected function cinco(): void
    {
        $this->resultado .= " h leoo";
    }
}