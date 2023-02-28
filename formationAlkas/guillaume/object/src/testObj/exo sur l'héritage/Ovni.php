<?php

class Ovni extends Deplacement
{

    public function __construct(private int $roues,
                                private string $invisible,
                                private string $vol)
    {
        parent::__construct();
    }
    public function contenuOvni():string
    {
        return "<br><strong>Contenu de l'Ovni :</strong><br>nombre de roues :".$this->roues."<br>invisible:".$this->invisible."<br>vol:".$this->vol;
    }
}