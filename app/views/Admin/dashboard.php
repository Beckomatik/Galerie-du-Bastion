<?php include ('header.php'); ?>

<main id="dashboard">

    <nav class="container" id="sidenav">
        <ul>
            <li>
                <a href="indexAdmin.php?action=yourinfos">
                    <p>Mes infos</p>
                    <p><img src="/app/public/Administration/img/info.png" alt=""></p>
                </a>
             
            </li>
            <li>
                <a href="indexAdmin.php?action=portfolio">
                    <p>Portfolio</p>
                    <p><img src="/app/public/Administration/img/gallery.png" alt=""></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=blog">
                    <p>Blog</p>
                    <p><img src="/app/public/Administration/img/blogging.png" alt=""></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=mails">
                    <p>Mes emails (<?php echo $datas["countMails"][0]; ?>) </p>
                    
                    <p><img src="/app/public/Administration/img/mail.png" alt=""></p>
                </a>
            </li>
            <li>
                <a href="indexAdmin.php?action=commentsAdmin">
                    <p id="lesCom">Commentaires (<?php echo $datas["countComments"][0]; ?>) </p>
                    
                    <p><img src="/app/public/Administration/img/commenter.png" alt=""></p>
                </a>
            </li>
        </ul>
    </nav>

</main>






<?php include ('footer.php'); ?>