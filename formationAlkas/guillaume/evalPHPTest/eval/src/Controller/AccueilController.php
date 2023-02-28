<?php

use src\Controller;

class AccueilController extends Controller
{
    public function accueil()
    {
        $this->render('accueil');
    }
}