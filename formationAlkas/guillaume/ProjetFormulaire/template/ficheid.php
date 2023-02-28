
<?php require_once('doctype.php'); ?>
<?php require_once('header.php'); ?>
<main role="main" class="pageMessagesform">

    <section class="form">
        <h1 class="h1">Formulaire Utilisateur</h1>
        <form action="" method="post">
            <div class="rangeeformulaire">
                <div class="colonneformulaire">
                    <label for="id">ID :</label>
                    <input class="input" type="text" name="id" id="id" placeholder="id de l'utilisateur"/>
                </div>
                <div class="colonneformulaire">
                    <label for="nom">Nom :</label>
                    <input class="input" type="text" name="nom" id="nom" placeholder="nom de l'utilisateur"/>
                </div>
            </div>
            <div>
                <button type="submit" name="button" class="button">Enregistrer</button>
            </div>
        </form>
    </section>

</main>
<?php require_once('footer.php'); ?>

