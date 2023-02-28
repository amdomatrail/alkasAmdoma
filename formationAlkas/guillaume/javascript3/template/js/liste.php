<?php
$head = '<script defer src="assets/js/liste.js"></script>';

require_once('template/doctype.php');
?>

<form id="myForm">
    <label for="myName">Donnez-moi votre nom :</label>
    <input id="nouvel-item" name="nouvel-item" autofocus autocomplete="off" required>
    <input type="submit" value="Envoyer !">
</form>
<div>
    <ul id="liste"></ul>
</div>

<?php

require_once('template/footer.php');
?>
<template id="template-item">
    <li>
        <p class="nom"></p>
    </li>
</template>