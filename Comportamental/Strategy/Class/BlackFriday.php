<?php

class BlackFriday
{
    private DescontoInterface $strategy;

    public function __construct(DescontoInterface $initialStrategy)
    {
        $this->strategy = $initialStrategy;
    }

    public function setStrategy(DescontoInterface $finalStrategy): self
    {
        $this->strategy = $finalStrategy;
        return $this;
    }

    public function conta(mixed $value)
    {
        return $this->strategy->desconto($value);
    }
}
