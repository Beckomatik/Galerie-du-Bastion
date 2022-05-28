<?php include ('header.php'); ?>

<main id="dashboard">

    <nav class="container" id="sidenav">
        <ul>
            <li>
                <a href="indexAdmin.php?action=yourinfos" title="mes infos">
                    <p>Mes infos</p>
                    <p><img src="/app/public/Administration/img/info.png" alt="logo informations"></p>
                </a>
             
            </li>
            <li>
                <a href="indexAdmin.php?action=portfolio" title="portfolio">
                    <p>Portfolio</p>
                    <p><img src="/app/public/Administration/img/gallery.png" alt="logo portfolio"></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=blog" title="blog">
                    <p>Blog</p>
                    <p><img src="/app/public/Administration/img/blogging.png" alt="logo blog"></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=mails" title="mes emails">
                    <p>Mes emails (<?php echo $datas["countMails"][0]; ?>) </p>
                    <p><img src="/app/public/Administration/img/mail.png" alt="logo emails"></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=followers" title="abonnées">
                    <p>Abonné·e·s (<?php echo $datas["countUsers"][0]; ?>) </p>
                    <p><img src="/app/public/Administration/img/followers.png" alt="logo personnes abonnées"></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=commentsAdmin" title="commentaires">
                    <p id="lesCom">Commentaires (<?php echo $datas["countComments"][0]; ?>) </p>
                    <p><img src="/app/public/Administration/img/commenter.png" alt="logo commentaires"></p>
                </a>
            </li>
        </ul>
    </nav>

</main>






<?php include ('footer.php'); ?>