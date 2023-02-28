<?php require_once('tpl/doctype.php'); ?>
<?php require_once('tpl/header.php'); ?>


<main role="main">
    <section role="contentinfo">
        <?php
        foreach ($users as $user) {
            $nomCompose = $user['nom'] . " " . $user['prenom'];
            $prenom = $user['prenom'] . '.svg';
            $id = $user['id'];
            ?>
            <div class='fenetre'>
                <div class='logoHeure'>
                    <img src='../assets/images/logo1.png' alt='logo' class='logo'>
                    <p class='heure'><?= date("H:i") ?></p>
                </div>
                <div class='premiereLigne'>
                    <figure>
                        <img src='../assets/images/fleche.png' alt='fleche' class='fleche'>
                        <img src='https://avatars.dicebear.com/api/big-smile/<?= $prenom ?>' alt='' class='tete'>
                    </figure>
                    <div>
                        <p class='nom'><?= $nomCompose ?></p>


                    </div>
                </div>
                <div class="deuxiemeGroup">
                    <address class='login'><?= $user['login'] ?></address>
                    <a class='message' href='<?= "pageMessages.php?id=".$id ?>'>Lire les messages</a>
                </div>
            </div>
        <?php }; ?>
    </section>
</main>
<?php require_once('tpl/footer.php'); ?>
