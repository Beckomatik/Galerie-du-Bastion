<?php include ('header.php'); ?>

<main class="forms">

    <h1>Portfolio</h1>
    <p>Toutes les photos ici présentes sont <strong>disponible à la vente</strong> dans différents formats</p>
    <p><a href="/index.php?action=contact" target="_blank">Contactez-moi </a>si vous souhaitez plus d'informations 😉</p>
    <?php foreach ($datas['result'] as $data) { ?>

        <div id="picportfolio">
            <p><?=$data['title'] ?></p>            
            <!-- <p>Catégorie : <?=$data['category'] ?></p>             -->
            <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>">

        </div>


    <?php } ?>

</main>

<?php include ('footer.php'); ?>