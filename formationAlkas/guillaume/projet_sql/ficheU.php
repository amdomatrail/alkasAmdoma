<?php
session_start();
require_once('boiteConnexion/confConnect.php');
require_once('boiteConnexion/manageSql.php');
require_once('boiteRequetes/messageList.php');
require_once('boiteRequetes/userList.php');
$sql = connex();

?>

<?php require_once('tpl/doctype.php'); ?>
<?php require_once('tpl/header.php'); ?>

    <main role="main" class="pageMessagesform">

        <section class="form">
            <h1 class="h1">Fiche Utilisateur</h1>

            <div class="rangeeformulaire">
                <h3>Login de l'utilisateur :</h3>
                <p class="fiche"><?= $_SESSION['user'] ?></p>
            </div>
        </section>

    </main>
<?php require_once('tpl/footer.php'); ?>
