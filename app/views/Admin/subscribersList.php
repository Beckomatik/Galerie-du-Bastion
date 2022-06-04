<?php include ('header.php'); ?>

<main class="container forms" id="usersList">

    <div class="backToMenu">
        <a href="./indexAdmin.php?action=dashBoard" title="retour accueil"><img src="./app/public/Administration/img/back-button.png" alt="fleche gauche">
            Retour à l'accueil</a>
    </div>

    <h1><img src="./app/public/Administration/img/followers.png" alt="logo user">Les utilisateurs inscrits</h1>
    <div class="flexList">

        <?php foreach($datas as $data){ ?>

            <div class="fullMail">
                <div class="mail">        
                    <p class="idUser"><?=$data['firstname']?> <?= $data['lastname'] ?></p>
                    <p>Id : <?=$data['id'] ?></p>
                    <p>Pseudo : <?=$data['pseudo'] ?></p>
                    <p><?=$data['email'] ?></p>        
                    <p><?=$data['created_at'] ?></p>
                </div>
                <div class="delete">
                    <a href="indexAdmin.php?action=deleteUser&id=<?= $data['id'] ?>" title="supprimer un utilisateur">Supprimer</a>
                </div>
            </div>

        <?php } ?>

    </div>

</main>
<?php include ('footer.php'); ?>