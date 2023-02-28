<?php

require_once('doctype.php');


?>



    <section class="form">
        <h1 class="h1">Formulaire de Page</h1>
        <form action="" method="post">
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="titre">Titre :</label>
                    <input class="input" type="text" name="titre" id="titre" value="<?= $titre ?>" placeholder="titre de la page"/>
                </div>
                <div class="colonneformulaire">
                    <label for="description">Description :</label>
                    <input class="input" type="text" name="description" id="description" value="<?= $description ?>"
                           placeholder="description de la page :"/>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="slug">Slug :</label>
                    <input class="loginform" type="text" name="slug" id="slug" value="<?= $slug ?>"   placeholder="slug"/>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="contenu">Contenu :</label>
                    <input class="loginform" type="text" name="contenu" id="contenu" value="<?= $contenu ?>" placeholder="écrire le contenu"/>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="date_de_creation">Date de creation :</label>
                    <input class="inputdate" type="date" name="date_de_creation" value="<?= $date_creation ?>" id="date_de_creation"
                           placeholder="date de création de la page"/>
                </div>

            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="date_de_modification">Date de modification :</label>
                    <input class="inputdate" type="date" name="date_de_modification" value="<?= $date_modification ?>" id="date_de_modification"
                           placeholder="date de modification de la page"/>
                </div>

            </div>
            <div>

                <button type="submit" name="button" class="button">Enregistrer</button>
            </div>
        </form>
    </section>


<?php
require_once('footer.php');
