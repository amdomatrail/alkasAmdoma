<?php

error_reporting(E_ALL);
ini_set('display_errors','1');
require_once ('Demo.php');
// demo est un objet
// new va créer l'instance de demo
$demo = new Demo();
$demo->test();
