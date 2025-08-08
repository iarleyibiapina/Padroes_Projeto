<?php

// evita duplicidade
class FuriaFlyweightFactory
{
    public function getShared(): AbstractFlyweightFuria
    {
        return new SharedConcreteFlyweight();
    }

    public function getUnshared(): AbstractFlyweightFuria
    {
        return new UnsharedConcreteFlyweight();
    }
}
