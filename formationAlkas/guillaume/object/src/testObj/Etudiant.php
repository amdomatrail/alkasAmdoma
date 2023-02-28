<?php

class Etudiant
{
    private string $nomEcole = 'test';
    public function __construct()
    {
    }
    protected function getNomEcole ()
    {
        return $this->nomEcole;
    }

}