<?php

class Voiture extends Deplacement
{

    public function __construct(private int $roues,
                                private string $volant,
                                private string $klaxon)
    {
        parent::__construct();
    }
    public function contenuVoiture():string
    {
        return "<br><strong>Contenu de la Voiture</strong>:<br>nombre de roues :".$this->roues."<br>volant :".$this->volant."<br> klaxon :".$this->klaxon;
    }

}