<?php
require_once('doctype.php');
?>

    <section class="listPage" role="contentinfo">
        <a href="index.php?admin=creation" title="Ajout d'une nouvelle page">+ Ajout d'une nouvelle page</a>

        <ul>
            <?php
            foreach ($pages as $page) {
                ?>
                <li><a href="?admin=modif&id=<?= $page['id'] ?>"><?= $page['titre'] ?></a> <a href="?admin=eff&id=<?= $page['id'] ?>" title="Supprime cette page (id=<?= $page['id'] ?>)">X</a></li>
                <?php
            }
            ?>

        </ul>
    </section>

<?php
require_once('footer.php');