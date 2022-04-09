<?php include ('header.php'); ?>

<main class="container forms" id="mailsPage">

    <h1>Mes mails</h1>
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
                <p id="mailContent"><?=$data['content'] ?></p>
            </a>        
        </div>
        <div id="delMail"><a href="indexAdmin.php?action=deleteMail&id=<?= $data['id'] ?>">Supprimer</a></div>
    </div>




    <?php } ?>


</main>
<?php include ('footer.php'); ?>