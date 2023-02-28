<?php
function headerLoc(string $cible):never
{
    header('Location:'.$cible);
    exit();
}