<?php
$head = '<script defer src="assets/js/formulaire.js"></script>';

require_once('template/doctype.php');
?>
<form method="post">
    <div>
        <label>votre nom :</label>
    </div>
            <input name="nom" id="nom" type="text" class="errors" required minlength="3" placeholder="nom">
    <div>
        <label>votre prénom :</label>
    </div>
            <input name="prenom" id="prenom" type="text" class="errors" placeholder="prénom">
    <div>
        <label>votre email :</label>
    </div>
            <input name="email" id="email" type="email" class="errors" placeholder="email">
    <div>
        <label>votre téléphone :</label>
    </div>
            <input name="tel" id="tel" type="" class="errors" placeholder="téléphone">
    <div>
        <label>votre pseudo</label>
    </div>
            <input name="pseudo" id="pseudo" type="text" class="errors" placeholder="pseudo">
    <div>
        <label>votre mot de pass</label>
    </div>
    <input name="pass" id="pass" type="password" class="errors" placeholder="pass">
    <div>
        <button type="submit">Envoyez</button>
    </div>
</form>
<?php

require_once('template/footer.php');