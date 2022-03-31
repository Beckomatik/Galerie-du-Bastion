<?php include ('header.php'); ?>

<?php
// var_dump($_POST);
// var_dump($_FILES);



?>
<p>Page blog</p>
<form action="indexAdmin.php?action=sendpicture" method="post" enctype="multipart/form-data">
    <!-- <label for="title">Ajouter un titre</label>
    <input type="text" name="title" id="title" placeholder="ex: mon super titre"> -->

    <label for="photo">Ajouter une ou plusieurs photos (5mo maximum)</label>
    <input type="file" multiple accept=".png, .jpg, .jpeg, .gif, .webp" name="photo" id="photo">
<!-- 
    <label for="content">Ecrivez votre article</label>
    <textarea name="content" id="content" placeholder="Saisissez votre texte"></textarea> -->

    <input type="submit" value="Poster l'article">
</form>

<p>Mes images</p>
<?php 
$req = $db->query('SELECT name from images');
while($data = $req->fetch()){
    echo'<img src="./app/public/Administration/img/'.$data['name'].'">';
}
?>

<?php include ('footer.php'); ?>
