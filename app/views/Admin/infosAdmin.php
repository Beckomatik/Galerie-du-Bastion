<?php include ('header.php'); ?>
<main class="container">
    <h1>Mes informations</h1>

    <p>Adresse email: <?= $datas['email'] ?> </p>
    <p>Nom: <?= $datas['lastname'] ?> </p>
    <p>Prénom: <?= $datas['firstname'] ?> </p>
</main>

<?php include ('footer.php'); ?>