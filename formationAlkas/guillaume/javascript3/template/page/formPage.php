<form method="post" action="" name="page">

    <label for="titre">
        Titre
        <input type="text" id="titre" name="titre" value="<?=$page['titre']??''?>">
    </label>
    <label for="description">
        Description
        <input type="text" id="description" name="description" value="<?=$page['description']??''?>">
    </label>
    <label for="menu">
        menu
        <input type="e" id="menu" name="menu" value="<?=$page['menu']??''?>">
    </label>
    <label for="content">
        contenu
        <textarea id="content" name="content" cols="30" rows="10"><?=$page['content']??''?></textarea>
    </label>

    <input type="hidden" name="send">

    <button type="submit">Envoyer</button>
</form>