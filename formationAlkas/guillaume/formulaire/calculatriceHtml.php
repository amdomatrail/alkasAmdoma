
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <header>
        <h1>Calculatrice</h1>
    </header>
  <form action="" method="post">

      <label for="n1">Nombre 1 :
      <input type="number" name="n1" id="n1" placeholder="saisir un nombre"/>
      </label>
      <label for="ope" >selection
      <select name="ope" id="ope">
          <option value="+">+</option>
          <option value="-">-</option>
          <option value="*">*</option>
          <option value="/">/</option>
      </select>
      <label for="n2">Nombre 2 :
      <input type="number" name="n2" id="n2" placeholder="saisir un nombre"/>
      </label>
          <p>
              <label for="story">Affichage des calculs :
          <p>
                  <textarea id="histo" name="histo" rows="5" cols="33" >
            <?= $historique;?>
        </textarea>
              </label>
              <button type="submit">Calculer</button>
          </p>
      </p>

  </form>
</body>
</html>