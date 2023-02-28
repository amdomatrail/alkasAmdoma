<?php

class Controller
{
    public function render(string $nomDuFichier, $data) : void
    {
        extract($data, EXTR_SKIP);

        require_once('template/'.$nomDuFichier.'.php');
    }
    function headerLoc(string $cible):never
    {
        header('Location:'.$cible.'.php');
        exit();
    }
}