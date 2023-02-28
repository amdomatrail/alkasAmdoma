<?php
$title = 'Page';
require_once('doctype.php');

?>
    <section class="user" role="contentinfo">

        <p>Le slug :<?= $slug ?></p>
        <p>Le titre :<?= $titre ?></p>
        <p>La description :<?= $description ?></p>
        <p>Le contenu :<?= $contenu ?></p>
        <p>La date de création :<?= $date_creation ?></p>

    </section>

<?php

require_once('footer.php');