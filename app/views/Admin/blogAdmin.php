<?php include ('header.php'); ?>
<p>Page blog</p>
<form action="indexAdmin.php?action=postArticle" method="post">
    <label for="title">Ajouter un titre</label>
    <input type="text" name="title" id="title" placeholder="ex: mon super titre">

    <label for="photo">Ajouter une ou plusieurs photos</label>
    <input type="file" multiple accept=".png, .jpg, .jpeg, .gif, .webp" name="photo" id="photo">

    <label for="content">Ecrivez votre article</label>
    <textarea name="content" id="content" placeholder="Saisissez votre texte"></textarea>

    <input type="submit" value="Poster l'article">
</form>

<?php include ('footer.php'); ?>
