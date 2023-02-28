<?php


$resultat = '';
$zoneTexte='';
$historique = '';
if ($_POST) {

    $op = $_POST['ope'];
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];

   
        switch ($_POST['ope']) {
        case "+":
        $resultat = $n1 + $n2;
        $zoneTexte = $n1.' + '.$n2.' = '.$resultat;
        break;
        case "-":
        $resultat = $n1 - $n2;
        $zoneTexte = $n1.' - '.$n2.' = '.$resultat;
        break;
        case "*":
        $resultat = $n1 * $n2;
        $zoneTexte = $n1.' * '.$n2.' = '.$resultat;
        break;
        case "/":
            $resultat = $n1 / $n2;
            $zoneTexte = $n1.' / '.$n2.' = '.$resultat;
        break;
            default:
               $resultat = "gros con";
        }
}

$historique = $zoneTexte;

require_once('calculatriceHtml.php');

/**
 * if (!empty($_POST['operateur'])) 
 */