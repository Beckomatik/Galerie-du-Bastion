<?php include('header.php'); ?>
<main class="container" id="portfolio">
    <p>Page portfolio</p>

    <form action="indexAdmin.php?action=sendPicFolio" method="post" enctype="multipart/form-data">

        <label for="photo">Ajouter une photo (5mo maximum)</label>
        <input type="file" accept=".png, .jpg, .jpeg, .gif, .webp" name="photo" id="photo">

        <label for="title">Ajouter un titre</label>
        <textarea name="title" id="title" placeholder="Saisissez votre texte"></textarea>

        <label for="category">Ajouter une catégorie</label>
        <textarea name="category" id="category" placeholder="Saisissez votre category"></textarea>

        <label for="alt">Pour le bon référencement de votre site , veuillez ajouter un descriptif de votre image</label>
        <textarea name="alt" id="alt" placeholder="Une brève description"></textarea>

       <div id="postImage"><input type="submit" value="Poster la photo"></div>
    </form>

    <p>Mes images</p>
    <?php foreach ($datas['result'] as $data) { ?>

        <div class="picportfolio">📷
            <p>Titre : <?=$data['title'] ?></p>            
            <p>Catégorie : <?=$data['category'] ?></p>            
            <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="">
            <p>Balise Alt : <?=$data['alt'] ?></p>            
            

        </div>


    <?php } ?>
</main>
<?php include('footer.php'); ?>