<?php require_once('doctype.php'); ?>
<?php require_once('header.php'); ?>
<main role="main" class="pageMessagesform">

    <section class="form">
        <h1 class="h1">Formulaire Utilisateur</h1>
        <form action="" method="post">
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="nom">Nom :</label>
                    <input class="input" type="text" name="nom" id="nom" placeholder="nom de l'utilisateur"/>
                </div>
                <div class="colonneformulaire">
                    <label for="prenom">Prénom :</label>
                    <input class="input" type="text" name="prenom" id="prenom" placeholder="prénom de l'utilisateur"/>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="password">Mot de Passe :</label>
                    <input class="loginform" type="password" name="password" id="password" placeholder="mot de passe"/>
                </div>
            </div>
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="date_de_naissance">Date de naissance :</label>
                    <input class="inputdate" type="date" name="date_de_naissance" id="date_de_naissance"
                           placeholder="date de naissance de l'utilisateur"/>
                </div>

            </div>
            <div>

                <button type="submit" name="button" class="button">Enregistrer</button>
            </div>
        </form>
    </section>

</main>
<?php require_once('footer.php'); ?>

