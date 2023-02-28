<?php
require_once('doctype.php');

?>
    <section class="user" role="contentinfo">

            <form method="dialog">
                <p><label>voulez-vous supprimer ce slug ?</label></p>
                <p>Le slug :<?= $slug ?></p>
                <menu>
                    <button value="cancel" type="button" name="Annuler">Annuler</button>
                    <button id="" value="default" type="button" name="confirmer">Confirmer</button>
                </menu>
            </form>



    </section>

<?php

require_once('footer.php');