<?php
require_once('doctype.php');

?>
    <section class="user" role="contentinfo">
        <div>
            <p>categorie :<?= $cat['categorie'] ?></p>
        </div>
        <div>
            <p>Le slug :<?= $page['slug'] ?></p>
        </div>
        <div>
            <p>Le titre :<?= $page['titre'] ?></p>
        </div>
        <div>
            <p>La description :<?= $page['description'] ?></p>
        </div>
        <div>
            <p>Le contenu :<?= $page['contenu']?></p>
        </div>
        <div>
            <p>La date de création :<?= $page['date_creation'] ?></p>
        </div>


    </section>

<?php

require_once('footer.php');