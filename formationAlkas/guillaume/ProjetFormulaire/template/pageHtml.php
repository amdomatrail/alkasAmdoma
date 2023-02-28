<?php require_once('doctype.php'); ?>
<?php require_once('header.php'); ?>


<main role="main">
    <section role="contentinfo">
        <?php
        foreach ($users as $user) {
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $id = $user['id'];
        $dateNaissance = $user['date_de_naissance'];
        ?>
                <div>
                    <p class="ligneClients">Id :<?= $id ?>, Nom :<?= $nom?>, Prénom :<?= $prenom?>, Date de naissance: <?= $dateNaissance ?> <img src="/etudiants/guillaume/ProjetFormulaire/assets/images/poubelle.png" class="poubelle"></p>
                </div>
        <?php }; ?>
    </section>
</main>
<?php require_once('footer.php'); ?>
