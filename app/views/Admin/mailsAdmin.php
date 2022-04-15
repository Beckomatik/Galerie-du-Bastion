<?php include ('header.php'); ?>

<main class="container forms" id="mailsPage">
    <div class="backToMenu">
        <a href="/indexAdmin.php?action=dashBoard"><img src="/app/public/Administration/img/back-button.png" alt="">
            Retour à l'accueil</a>
    </div>

    <h1><img src="/app/public/Administration/img/logoemail.png" alt=""> Mes mails</h1>
    <?php foreach($datas as $data){ ?>
    <div class="fullMail">
        <div class="mail">
            <a href="indexAdmin.php?action=showMail&id=<?= $data['id'] ?>">
                <div class="topMail">
                    <p><?=$data['fullname'] ?></p>
                    <p><?=$data['created_at'] ?></p>
                </div>
                <!-- <p>Email : <?=$data['mail'] ?></p> -->
                <!-- <p>Téléphone : <?=$data['phone'] ?></p> -->
                <p><?=$data['objet'] ?></p>
                <p class="mailContent"><?=$data['content'] ?></p>
            </a>
        </div>
        <div id="delMail"><a href="indexAdmin.php?action=deleteMail&id=<?= $data['id'] ?>">Supprimer</a></div>
    </div>




    <?php } ?>


</main>
<?php include ('footer.php'); ?>