
"<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Liste de pays</title>
</head>
<body>
<p class="titre">Rangement par ordre alphabétique des noms de pays par continent :</p>"
<?php
    foreach ($countries_list as $nom) {
        if ($continent != $nom['continent']) {
        $continent = $nom['continent'];
        }?>
        <div class="cont">Nom du continent :
        <p class="nomCont">
            <?php echo $continent."<br><br>";?>
        </p></div>
<?php
    foreach ($countries_list as $items) {
        if ($continent == $items['continent']) {
        ?>
        <ul><li>
            <?php
            echo $items['name']."<br>";
            ?>

        </li></ul>
<?php
        }
    }
    }
?>
</body>
</html>