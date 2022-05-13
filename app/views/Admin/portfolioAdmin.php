<?php include('header.php'); ?>
<main class="container forms" id="folioFront">



<div class="backToMenu">
       <a href="/indexAdmin.php?action=dashBoard"><img src="/app/public/Administration/img/back-button.png" alt=""> Retour à l'accueil</a> 
</div>
    
    <!-- message de confirmation de la suppression, à faire disparaitre avec JS au bout de quelques secondes -->
    <!-- <?php if(isset($_GET['success'])&& ($_GET['success']=='true')){echo 'La photo a bien été supprimée';} ?> -->
    
    <h1><i class="fa-solid fa-arrow-right"></i> Page portfolio</h1>
    <form action="indexAdmin.php?action=sendPicFolio" method="post" enctype="multipart/form-data">

        <label for="photo">Ajouter une photo (5mo maximum)</label>
        <input type="file" accept=".png, .jpg, .jpeg, .gif, .webp" name="photo" id="photo">

        <label for="title">Ajouter un titre</label>
        <textarea name="title" id="title" placeholder="Saisissez votre texte"></textarea>

        <label for="category">Ajouter une catégorie</label>
        <textarea name="category" id="category" placeholder="Saisissez votre category"></textarea>

        <label for="alt">Pour le bon référencement de votre site , veuillez ajouter un descriptif de votre image</label>
        <textarea name="alt" id="alt" placeholder="Une brève description"></textarea>

       <div class="postForm"><input type="submit" value="Poster la photo"></div>
    </form>

    <p id="mesimages">Mes images</p>
    <?php foreach ($datas['result'] as $data) { ?>

        <div class="myPosts">          
            <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="">
            <p>Titre : <?=$data['title'] ?></p>            
            <p>Catégorie : <?=$data['category'] ?></p>            
            <p>Balise Alt : <?=$data['alt'] ?></p>
            <p><a href="indexAdmin.php?action=deletePicture&id=<?= $data['id'] ?>">Supprimer la photo</a></p>
        </div>

    <?php } ?>
    
</main>
<?php include('footer.php'); ?>