<?php

function fonctionQuiRenvoieUnThrow($vit): void
{
    $exception = new Exception('voici la vitesse',$vit);
    throw $exception;
}

try{

    fonctionQuiRenvoieUnThrow();

} catch (Exception $exception) {
    $code = $exception->getCode();
    switch ($code) {
        case 250 :
            die ('la vitesse est trop élevée'.$exception->getMessage());
            break;
        default:
            die($exception->getMessage().' ralenti');
    }
}