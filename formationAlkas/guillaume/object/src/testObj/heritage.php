<?php
require_once ('testObj/Etudiant.php');
require_once ('testObj/Quentin.php');
$quentin = new Quentin(175);
echo $quentin->taille();