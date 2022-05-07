<?php include ('header.php'); ?>

<main class="container forms" id="adminComments">
    <div class="backToMenu">
        <a href="/indexAdmin.php?action=dashBoard"><img src="/app/public/Administration/img/back-button.png" alt="">
            Retour à l'accueil</a>
    </div>

    <h1><img src="/app/public/Administration/img/commentlogo.png" alt="">Les commentaires</h1>
  
    <?php
        foreach($datas as $allComments){ ?>
            <div class="userComments">
                <div class="commentContent">
                    <p><?= $allComments['created_at'] ?></p>
                    <p>Sur l'article : " <strong><?= $allComments['blogpost_id'] ?></strong> " :</p>
                    <p><?= $allComments['user_id'] ?> - a écris : " <span><?= $allComments['content'] ?></span> "</p>
                </div>
                <div class="delete">
                    <a href="indexAdmin.php?action=deleteComment&id=<?= $allComments['id'] ?>">Supprimer</a>
                </div>
            </div>

        <?php } ?>



</main>
<?php include ('footer.php'); ?>