<?php include ('header.php'); ?>

<main class="container" id="homepage">
    <h1>Photographe breton pur beurre</h1>
    <div id="intro">
        <p>Bienvenue sur <strong>la Galerie du Bastion</strong>, vous retrouverez sur mon site ma <strong
                ><a href="/index.php?action=portfolio" title="voir le portfolio" target="_blank" class="wavy">galerie d'images</a></strong> qui se
            remplit au fur et à mesure de mes différents <strong>projets photographiques</strong>.</p>
        <p>Je me déplace dans toute la France pour <strong>réaliser des shootings photos</strong> (n'hésitez pas à me <a
                href="/index.php/contact" title="page de contact" class="wavy" target="_blank">contacter</a> 😉) et j'en profite en général pour rédiger un
            article sur les lieux que je visite. Vous pouvez les lire dans la partie <strong><a
                    href="/index.php/blog" title="voir le blog" class="wavy" target="_blank">blog</a></strong></p>
    </div>
    <div id="home-news">
        <h2><i class="fa-solid fa-right-long"></i>Les dernières photos</h2>
        <div class="theGallery">

            <?php foreach ($datas['resultPics'] as $data) { ?>

            <div class="picPortfolio">
                <a href="<?= $datas["resPath"] . $data['picture'] ?>" title="Cliquer pour voir l'image en plein écran"><img class="pix"
                        src="<?= $datas["resPath"] . $data['picture'] ?>" alt="<?= $data['alt'] ?>"></a>
            </div>

            <?php } ?>

        </div>
        <a class="seeMore" href="index.php?action=portfolio" title="Voir la page portfolio">Voir plus</a>
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
            <a href="index.php?action=oneArticle&id=<?= $data['id'] ?>" title="Lire l'article">Lire l'article</a>
        </article>

        <hr>
        <?php } ?>

    </section>
</main>

<?php include ('footer.php'); ?>