<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Feuille de présentation</title>
</head>
<body>
<header class="header" role="banner">
<?php
foreach ($ecole as $classe => $specialite) {
    echo "<h1>$classe</h1>";
?>
</header>"
<main role="main">
    <?php
foreach ($classe as $specialite) {
foreach ($specialite as $francais) {
foreach ($francais as $eleves => $prenom) {


            foreach ($prenom as $prenom => $notes) {
                echo "<p>";
                echo"<img src='https://robohash.org/$prenom' alt='photo d'un élève'>";
                echo"<figcaption>";

                echo "prénom : $prenom";
                sort($notes);
            foreach ($notes as $note) {
                echo $note . " ";
            }
            echo "<br></p></figcaption></figure></main>";
            }
}
}
}
}
?>
</body>
</html>