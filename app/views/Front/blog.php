<?php include ('header.php'); ?>

<main class="forms">
    <h1>Le Blog</h1>
    <h2>Retrouvez ici mes derniers voyages ✈ , mes états d'âmes 🤯 ou encore des infos techniques pour les gears addicts 📷 😀</h2>
    </p>
    <?php foreach ($datas['result'] as $data) { ?>

    <div id="myArticle">
        <h3><?=$data['title'] ?></h3>
        <p>Publié le <?=$data['created_at'] ?></p>
        <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>">
        <p>Catégorie : #<?=$data['category'] ?></p>            
        <p><?=$data['content'] ?></p>        
    </div>

    <?php } ?>

</main>

<?php include ('footer.php'); ?>