<?php
require_once('doctype.php');
?>
    <section class="form">
        <h2 class="titre">Formulaire de Delete</h2>
        <form action="" method="post">
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <h4>Slug :<?= $page['slug'] ?></h4>

                </div>
            </div>

            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label><br>voulez-vous supprimer ce slug ?</label>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div>
                <div class="colonneformulaire">

                    <input name="annuler" type="submit" value="annuler">
                </div>
            </div>

                <div class="colonneformulaire">
                    <input name="supprimer" type="submit" value="supprimer">

                </div>
            </div>
            </div>
        </form>
    </section>
<?php
require_once('footer.php');

