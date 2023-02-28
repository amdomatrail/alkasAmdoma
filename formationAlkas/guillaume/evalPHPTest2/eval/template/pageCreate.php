<?php

require_once('doctype.php');

?>
    <section class="form">
        <h1 class="h1">Formulaire de Page</h1>
        <form action="" method="post">
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="titre">Titre :</label>
                    <input class="input" type="text" name="titre" id="titre" value=""  placeholder="titre de la page"/>
                </div>
                <div class="colonneformulaire">
                    <label for="description">Description :</label>
                    <input class="input" type="text" name="description" value=""  id="description"
                           placeholder="description de la page :"/>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
            <label for="cat-select">Choisir une catégorie :</label>


            <select name="categorie" id="cat-select" class="input">
                <option value="">--Choisir une option--</option>

                <?php

                foreach ($categories as $categorie) {
                    ?>
                    <option value="<?= $categorie['id'] ?>"><?= $categorie['categorie']?></option>
                    <?php
                }
                ?>
            </select>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                        <fieldset> <legend>Contenu : </legend>
                            <label>
                                <textarea id="content" name="contenu" cols="68" rows="10" placeholder="écrire le contenu..."></textarea>
                            </label>
                        </fieldset>
                </div>
            </div>





            <div>
                <button type="submit" name="button" class="button">Enregistrer</button>
            </div>
        </form>
    </section>
<?php
require_once('footer.php');
