<?php include ('header.php'); ?>

<main class="container forms" id="adminComments">
    <div class="backToMenu">
        <a href="/indexAdmin.php?action=dashBoard" title="retour à l'accueil"><img src="/app/public/Administration/img/back-button.png" alt="fleche gauche">
            Retour à l'accueil</a>
    </div>

    <h1><img src="/app/public/Administration/img/commentlogo.png" alt="logo commentaires">Les commentaires</h1>
    <div class="flexList">

        <?php foreach($datas as $allComments){ ?>

                <div class="userComments">
                    <div class="commentContent">
                        <p><?= $allComments['created_at'] ?></p>
                        <p>Pour l'article : " <strong><?= $allComments['title'] ?></strong> " :</p>
                        <p><strong><?= $allComments['pseudo'] ?></strong> - a écrit : " <span><?= $allComments['content'] ?></span> "</p>
                    </div>
                    <div class="delete">
                        <a href="indexAdmin.php?action=deleteComment&id=<?= $allComments['commentId'] ?>" title="supprimer un commentaire">Supprimer</a>
                    </div>
                </div>

        <?php } ?>

    </div>

</main>
<?php include ('footer.php'); ?>