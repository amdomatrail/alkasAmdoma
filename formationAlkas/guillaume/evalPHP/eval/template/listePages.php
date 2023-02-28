<?php
$title = 'ListePages';
require_once('doctype.php');

?>
    <section class="user" role="contentinfo">
        <?php
        foreach ($listePages as $listePage) {
            ?>
            <p><a href="index.php?page=<?= $listePage['slug'] ?>"><?= $listePage['slug'] ?></a>
                <a href="index.php?page_admin=modif&id=<?= $listePage['id'] ?>">
                    <img class="iconeModif"
                         src="/etudiants/guillaume/evalPHP/eval/assets/images/icon_modif.png"
                         alt="icone de modification"></a>
                <a href="index.php?page_admin=delete&id=<?= $listePage['id'] ?>">
                    <img class="iconePoub"
                         src="/etudiants/guillaume/evalPHP/eval/assets/images/icone%20poubelle.png"
                         alt="icone de poubelle"></a></p>
            <?php
        }
        ?>
    </section>

<?php

require_once('footer.php');