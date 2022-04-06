<?php include ('header.php'); ?>

<main class="container forms">

    <!-- message de confirmation de la suppression, à faire disparaitre avec JS au bout de quelques secondes -->
    <!-- <?php if(isset($_GET['success'])&& ($_GET['success']=='true')){echo 'L\'article a bien été supprimée';} ?> -->

<h1><i class="fa-solid fa-arrow-right"></i> Page blog</h1>
<form action="indexAdmin.php?action=sendArticle" method="post" enctype="multipart/form-data">

        <label for="photo">Ajouter une photo (5mo maximum)</label>
        <input type="file" multiple accept=".png, .jpg, .jpeg, .gif, .webp" name="photo" id="photo">
        
        <label for="alt">Pour le bon référencement de votre site , veuillez ajouter un descriptif de votre image</label>
        <textarea name="alt" id="alt" placeholder="Une brève description"></textarea>

        <label for="title">Ajouter un titre</label>
        <textarea name="title" id="title" placeholder="Saisissez votre texte"></textarea>

        <label for="content">Saisissez votre article</label>
        <textarea name="content" id="content" placeholder="Saisissez votre texte"></textarea>

        <label for="category">Ajouter une catégorie</label>
        <textarea name="category" id="category" placeholder="Saisissez votre category"></textarea>


       <div class="postForm"><input type="submit" value="Poster l'article"></div>
</form>

<p id="mesarticles">Mes articles</p>
    <?php foreach ($datas['result'] as $data) { ?>

        <div class="myPosts">          
            <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="">
            <p>Titre : <?=$data['title'] ?></p>            
            <p>Catégorie : <?=$data['category'] ?></p>            
            <p>Contenu : <?=$data['content'] ?></p> 
            <p>Balise Alt : <?=$data['alt'] ?></p>           
            <p><a href="indexAdmin.php?action=deleteArticle&id=<?= $data['id'] ?>">Supprimer l'article</a></p>
        </div>

    <?php } ?>


</main>
<?php include ('footer.php'); ?>
