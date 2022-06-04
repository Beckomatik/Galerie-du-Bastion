<?php include ('header.php'); ?>

<main class="container forms" id="mofifArticle">

    <div class="backToMenu">
        <a href="./indexAdmin.php?action=dashBoard" title="retour accueil"><img src="./app/public/Administration/img/back-button.png" alt="fleche gauche"> Retour à l'accueil</a> 
    </div>

    <h1><i class="fa-solid fa-arrow-right"></i> Modifier un article</h1>

        <form action="indexAdmin.php?action=modifyArticle&id=<?= $datas['result']['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="myPosts">

            <p>Article du : <?= $datas['result']['created_at'] ?></p>
            <p>Photo actuelle : 
             
            <img src="<?= $datas["resPath"] . $datas['result']['picture'] ?>" alt=""></p>
            <label for="photo">Modifier la photo (5mo maximum)</label>
            <input type="file" accept=".png, .jpg, .jpeg, .gif, .webp" name="photo" id="photo">
            
            
            <label for="alt">Modifier la balise alt (référencement)</label>
            <textarea name="alt" id="alt" placeholder="Une brève description"><?=$datas['result']['alt'] ?></textarea>
            
            <label for="title">Modifier le titre</label>
            <textarea name="title" id="title"> <?=$datas['result']['title'] ?></textarea>

            <label for="content">Modifier le contenu de l' article</label>
            <textarea name="content" id="content" placeholder="Saisissez votre texte"><?=$datas['result']['content'] ?></textarea>

            <label for="category">Modifier la catégorie</label>
            <textarea name="category" id="category" placeholder="Saisissez votre category"><?=$datas['result']['category'] ?></textarea>

            <div class="postForm"><input type="submit" value="Publier les modifications"></div>
            
        </div>
       
    </form>

    



    






</main>
<?php include ('footer.php'); ?>