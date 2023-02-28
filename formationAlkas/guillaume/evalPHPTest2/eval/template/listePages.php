<?php
require_once('doctype.php');

?>
    <section class="user" role="contentinfo">
        <?php
        foreach ($listePages as $listePage) {
            ?>
            <p><a href="index.php?page=<?= $listePage['slug'] ?>"><?= $listePage['slug'] ?></a>
                <a href="index.php?admin=update&id=<?= $listePage['id'] ?>">
                    <img class="iconeModif"
                         src="/etudiants/guillaume/evalPHP/eval/assets/images/icon_modif.png"
                         alt="icone de modification"></a>
                <a href="index.php?admin=delete&slug=<?= $listePage['slug'] ?>">
                    <img class="iconePoub"
                         src="/etudiants/guillaume/evalPHPTest/eval/assets/images/icons8-poubelle-32.png"
                         alt="icone de poubelle"></a></p>
            <?php
        }
        ?>
    </section>

<?php

require_once('footer.php');