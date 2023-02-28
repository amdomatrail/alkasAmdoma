<?php

class Quentin
{
    public function __construct(private int $tailleQuentin)
    {
        parent::__construct();
    }
    public function getTaille() :int
    {
       return  $this->tailleQuentin;
    }

    public function information():string
    {
        return'Nom école:'.$this->getNomEcole().'<br>taille Quentin :'.$this->getTaille();
    }
}