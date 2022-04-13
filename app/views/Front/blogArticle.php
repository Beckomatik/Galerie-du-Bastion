<?php include ('header.php'); ?>

<main class="forms" id="oneArticlePage">
    <div class="backBtn"><a href="index.php?action=blog"><img src="/app/public/Administration/img/back-button.png"
                alt="bouton de retour en arrière">Retour au blog</a></div>  

    <article class="myArticle">
        <h1><?=$datas['result']['title'] ?></h1>
        <p class="createdAt">Publié le <?=$datas['result']['created_at'] ?></p>
        <img src="<?= $datas["resPath"] . $datas['result']['picture'] ?>" alt="<?= $datas['result']['alt'] ?>">
        <p class="category">Catégorie : #<?=$datas['result']['category'] ?></p>            
        <p><?=$datas['result']['content'] ?></p>        
    </article>
<?php
if(isset($_SESSION)){?>
<section class="comments formulaire">
        <h2>Laisser un commentaire</h2>
        <p>Votre adresse e-mail ne sera pas publiée</p>
        <form action="index.php?action=postComment&user_id=<?= $_SESSION['id'] ?>&article_id=<?= $datas['result']['id'] ?>" method="POST">

            <label for="content">Votre commentaire</label>
            <textarea id="content" name="content" required></textarea>

            <input type="submit" value="Poster un commentaire">

        </form>
    </section>
<?php }?>
   

</main>

<?php include ('footer.php'); ?>