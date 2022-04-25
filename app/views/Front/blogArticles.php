<?php include ('header.php'); ?>

<main class="forms" id="blogPage">
    <h1>Le Blog</h1>
    <h2>Retrouvez ici mes derniers voyages ✈ , mes états d'âmes 🤯 ou encore des infos techniques pour les gear addicts 📷 😀</h2>
    </p>
  <?php foreach ($datas['result'] as $data) { ?>

    <article class="myArticle">
        <h3><?=$data['title'] ?></h3>
        <p class="createdAt">Publié le <?=$data['created_at'] ?></p>
        <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>">
        <p class="category">Catégorie : #<?=$data['category'] ?></p>            
        <p class="content"><?=mb_substr($data['content'],0,300) ?>[...]</p>        
        <button class="btn"><a href="index.php?action=oneArticle&id=<?= $data['id'] ?>">Lire l'article</a></button>
    </article>

    <?php } ?>

</main>

<?php include ('footer.php'); ?>