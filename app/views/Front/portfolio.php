<?php include ('header.php'); ?>

<main class="forms" id="portfolioPage">

    <h1>Portfolio</h1>
    <p>Toutes les photos ici présentes sont <strong>disponible à la vente</strong> dans différents formats</p>
    <p><a href="/index.php?action=contact" target="_blank">Contactez-moi </a>si vous souhaitez plus d'informations&nbsp;😉
    </p>
    
    <div class="theGallery">

        <?php foreach ($datas['result'] as $data) { ?>

            <div class="picPortfolio">
                <p><?=$data['title'] ?></p> 
                <a href="<?= $datas["resPath"] . $data['picture'] ?>"><img class="pix" src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>"></a>
            </div>
      
        <?php } ?>
        
    </div>

</main>

<?php include ('footer.php'); ?>