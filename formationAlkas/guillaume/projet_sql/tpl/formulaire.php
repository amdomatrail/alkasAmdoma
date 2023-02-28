<?php require_once('tpl/doctype.php'); ?>
<?php require_once('tpl/header.php'); ?>

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
                    <label for="login">Login :</label>
                    <input class="loginform" type="email" name="login" id="login" placeholder="sophie@exemple.com"/>
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
                    <label for="date_naissance">Date de naissance :</label>
                    <input class="inputdate" type="date" name="date_naissance" id="date_naissance"
                           placeholder="date de naissance de l'utilisateur"/>
                </div>
                <div class="colonneformulaire">
                    <label for="roles">Choisir un rôle :</label>
                    <select name="roles" id="roles" class="roles">
                        <option value="">--Choisissez une option--</option>
                        <?php
                        foreach ($roles as $role) {
                            echo '<option value="' . $role['id'] . '">' . $role['nom'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div>

                <button type="submit" name="button" class="button">Enregistrer</button>
            </div>
        </form>
    </section>

</main>
<?php require_once('tpl/footer.php'); ?>

