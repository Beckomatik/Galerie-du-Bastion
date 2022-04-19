<?php include ('header.php'); ?>

<main class="container" id="dashboardUser">
<?php if(isset($_SESSION['id'])){?>
    <h1>Bienvenue de votre espace utilisateur <?= $_SESSION['pseudo'] ?> 🙂 !</h1> 
    <h2>Vos commentaires :</h2>
    
    <?php
        foreach($datas as $allComments){ ?>
            <div class="userComments">
                <div class="commentContent">
                    <p>Le <?= $allComments['created_at'] ?></p>
                    <p>Sur l'article : " <strong><?= $allComments['title'] ?></strong> " :</p>
                    <p>Vous avez écris : " <span><?= $allComments['content'] ?></span> "</p>
                </div>
                <div class="deleteComment">
                    <a href="index.php?action=deleteComment&id=<?= $allComments['id'] ?>"><img src="/app/public/Front/image/supprimer.png" alt="icone de corbeille supprimer">Supprimer</a>
                </div>
            </div>

        <?php } ?>
    <?php } ?>



</main>

<?php include ('footer.php'); ?>