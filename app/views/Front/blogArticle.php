<?php include ('header.php'); ?>

<main class="forms" id="oneArticlePage">
    <div class="backBtn"><a href="index.php?action=blog"><img src="/app/public/Administration/img/back-button.png"
                alt="bouton de retour en arrière">Retour au blog</a></div>  

    <article class="myArticle">
        <h1><?=$datas['result']['title'] ?></h1>
        <p class="createdAt">Publié le <?=$datas['result']['created_at'] ?></p>
        <img src="<?= $datas["resPath"] . $datas['result']['picture'] ?>" alt="<?= $datas['result']['alt'] ?>">
        <p class="category">Catégorie : #<?=$datas['result']['category'] ?></p>            
        <p class="articleContent"><?=$datas['result']['content'] ?></p>        
    </article>
<?php
if(isset($_SESSION['id'])){?>
<section class="comments formulaire">
        <h2>Laisser un commentaire</h2>
        <p id="infoCom">Votre adresse e-mail ne sera pas publiée</p>
        <form action="index.php?action=postComment&user_id=<?= $_SESSION['id'] ?>&article_id=<?= $datas['result']['id'] ?>" method="POST">

            
            <textarea aria-label="Ajouter un commentaire" id="content" placeholder="Ajouter un commentaire" name="content" required></textarea>

            <input type="submit" value="Poster un commentaire">

        </form>
    </section>
<?php }?>

<section class="comments">
    <h3>Commentaires</h3>
    
    <?php foreach ($datas as $comment) {?>
    <?php if(isset($comment['pseudo'])){?>
        <div class="oneComment">
            <p id="comName"><?= $comment['pseudo']?></p>    
            <p id="comDate">A écrit le <?= $comment['created_at']?></p>    
            <p id="comCom"><img src="/app/public/Front/image/straight-quotes.png" alt="guillemets de citation"><span><?= $comment['content']?></span><img src="/app/public/Front/image/straight-quotes.png" alt="guillemets de citation"></p>  
        </div>
      
    <?php }; }  ?>
</section>
   

</main>

<?php include ('footer.php'); ?>