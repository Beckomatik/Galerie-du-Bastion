<?php include ('header.php'); ?>

<main class="container forms" id="mailsPage">
    <div class="backToMenu">
        <a href="./indexAdmin.php?action=dashBoard" title="retour à l'accueil"><img src="./app/public/Administration/img/back-button.png" alt="fleche gauche">
            Retour à l'accueil</a>
    </div>

    <h1><img src="./app/public/Administration/img/logoemail.png" alt="logo emails"> Mes mails</h1>

    <?php foreach($datas as $data){ ?>

        <div class="fullMail">
            <div class="mail">
                <a href="indexAdmin.php?action=showMail&id=<?= $data['id'] ?>" title="voir l'email">
                    <div class="topMail">
                        <p><?=$data['fullname'] ?></p>
                        <p><?=$data['created_at'] ?></p>
                    </div>
                    <p><?=$data['objet'] ?></p>
                    <p class="mailContent"><?=$data['content'] ?></p>
                </a>
            </div>
            <div class="delete">
                <a href="indexAdmin.php?action=deleteMail&id=<?= $data['id'] ?>" title="supprimer l'email">Supprimer</a>
            </div>
        </div>

    <?php } ?>

</main>
<?php include ('footer.php'); ?>