<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?= $titre ?? '' ?></title>
    <meta name="description" content="<?=$description ?? ''?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">

    <?=$head ?? '' ?>

</head>

<body>

<?php
require_once ('banniere.php');