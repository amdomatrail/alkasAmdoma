<?php
require_once ('Deplacement.php');
require_once ('Voiture.php');
require_once ('Velo.php');
require_once ('Ovni.php');
require_once ('throwtrycatch.php');

$voiture = new Voiture(3,'oui','oui');
$velo = new Velo(2, 'oui');
$ovni = new Ovni(0, 'oui', 'oui');

$voiture->setAccelerer(251);
$voiture->setAvancer(20);
$voiture->setFreiner(0);
echo $voiture->contenuVoiture();
echo $voiture->getDeplacement();

$velo->setAccelerer(0);
$velo->setAvancer(0);
$velo->setFreiner(1);
echo $velo->contenuVelo();
echo $velo->getDeplacement();

$ovni->setAccelerer(100);
$ovni->setAvancer(1);
$ovni->setFreiner(0);
echo $ovni->contenuOvni();
echo $ovni->getDeplacement();




