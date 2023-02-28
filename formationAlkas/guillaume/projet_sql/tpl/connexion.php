<?php require_once('doctype.php'); ?>
<?php require_once('header.php'); ?>

    <main role="main" class="pageMessagesform">

        <section class="form">

            <h1 class="h1">Formulaire Connexion</h1>
            <form action="" method="post">

                <div class="rangeeformulaire">
                    <div class="colonneformulaire">
                        <label for="login">Login :</label>
                        <input class="loginform" type="email" name="login" id="login" placeholder="sophie@exemple.com" required>
                    </div>
                </div>
                <div class="rangeeformulaire">
                    <div class="colonneformulaire">
                        <label for="password">Mot de Passe :</label>
                        <input class="loginform" type="password" name="password" id="password" placeholder="mot de passe" required>
                    </div>
                </div>

                <div>

                    <button type="submit" name="button" class="button">Connexion</button>
                </div>


            </form>
        </section>

    </main>
<?php require_once('tpl/footer.php'); ?>