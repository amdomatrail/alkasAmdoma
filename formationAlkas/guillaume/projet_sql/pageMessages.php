<?php
session_start();
require_once('boiteConnexion/confConnect.php');
require_once('boiteConnexion/manageSql.php');
require_once('boiteRequetes/messageList.php');
require_once('boiteRequetes/userList.php');
$sql = connex();
$id = $_GET['id'];
$messages = listMessagesFromUserID($sql, $id);
$utilisat = utilisateur($sql, $id)[0];

$nomCompose = $utilisat['nom'] . " " . $utilisat['prenom'];
$role = $utilisat['nom_role'];

?>
<?php require_once('tpl/doctype.php'); ?>
<?php require_once('tpl/header.php'); ?>
    <main role="main" class="pageMessages">
        <section>
            <div class="designation">
                <div class="designBis"><p>Nom de l'utilisateur :</p>
                    <p><?= $nomCompose ?></p></div>
                <div class="designBis"><p>Role de l'utilisateur :</p>
                    <p><?= $role ?></p></div>
            </div>
        </section>
        <section>
            <?php
            foreach ($messages as $message) {
                ?>
                <div class='bulDeMes'>
                    <h3>Date de création du message :</h3>
                    <p><?= $message['date_creation'] ?></p>
                    <h3>Contenu du message :</h3>
                    <p><?= $message['contenu'] ?></p>
                </div>
            <?php }; ?>
        </section>
    </main>
<?php require_once('tpl/footer.php'); ?>