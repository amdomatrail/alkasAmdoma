<?php

class Velo extends Deplacement
{
    public function __construct(private int $roues,
                                private string $poignee)
    {
        parent::__construct();
    }


    public function contenuVelo():string
{
    return "<br><strong>Contenu du Vélo :</strong><br>nombre de roues :".$this->roues."<br>poignée :".$this->poignee;
}
}