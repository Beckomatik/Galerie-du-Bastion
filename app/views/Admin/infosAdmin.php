<?php include ('header.php'); ?>
<main class="container" id="infosAdmin">
<div class="backToMenu">
       <a href="/indexAdmin.php?action=dashBoard"><img src="/app/public/Administration/img/back-button.png" alt=""> Retour à l'accueil</a> 
</div>
    <h1>Mes informations</h1>

    <p>Adresse email : <?= $datas['email'] ?> </p>
    <p>Nom : <?= $datas['lastname'] ?> </p>
    <p>Prénom : <?= $datas['firstname'] ?> </p>
</main>

<?php include ('footer.php'); ?>