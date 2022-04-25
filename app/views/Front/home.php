<?php include ('header.php'); ?>

<main class="homepage container">
    <h1>Photographe breton pur beurre</h1>
    <div id="home-news">
        <h2><i class="fa-solid fa-right-long"></i>Les dernières photos</h2>
        <div class="theGallery">
            <?php foreach ($datas['resultPics'] as $data) { ?>

                <div class="picPortfolio">
                <a href="<?= $datas["resPath"] . $data['picture'] ?>"><img class="pix" src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>"></a>
                </div>
            
            <?php } ?>
        </div>
        <a class="seeMore" href="index.php?action=portfolio">Voir plus</a>
    </div>
    <section id="home-blog">
        <h2><i class="fa-solid fa-right-long"></i>Les news du blog</h2>
        <?php foreach ($datas['resultBlog'] as $data) { ?>

            <article class="myArticle">
                <h3><?=$data['title'] ?></h3>
                <p class="createdAt">Publié le <?=$data['created_at'] ?></p>
                <img src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>">
                <p class="category">Catégorie : #<?=$data['category'] ?></p>            
                <p class="content"><?=mb_substr($data['content'],0,300) ?>[...]</p>        
                <a href="index.php?action=oneArticle&id=<?= $data['id'] ?>">Lire l'article</a>
            </article>

        <?php } ?>

    </section>
</main>

<?php include ('footer.php'); ?>