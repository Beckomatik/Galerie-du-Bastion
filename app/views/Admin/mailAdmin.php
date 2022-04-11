<?php include ('header.php'); ?>

<main class="container forms" id="mailItem">
    <div class="backBtn"><a href="indexAdmin.php?action=mails"><img src="/app/public/Administration/img/back-button.png"
                alt=""> Retour aux emails</a></div>
    <div id="mailPage">

        <h1><img src="/app/public/Administration/img/avatar.png" alt=""><?=$datas['fullname'] ?></h1>

        <div class="oneMail">

            <p><?=$datas['created_at'] ?></p>
            <p>Email : <?=$datas['mail'] ?></p>
            <p>Téléphone : <?=$datas['phone'] ?></p>
            <p><?=$datas['objet'] ?></p>
            <p class="mailContent"><?=$datas['content'] ?></p>
            <div class="modifOrDel">
                <a href="mailto:<?= $datas['mail'] ?>">Répondre</a>
                <a href="indexAdmin.php?action=deleteMail&id=<?= $datas['id'] ?>">Supprimer</a>
            </div>

        </div>


    </div>








</main>
<?php include ('footer.php'); ?>