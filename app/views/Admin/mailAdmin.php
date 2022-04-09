<?php include ('header.php'); ?>

<main class="container forms" id="mailPage">

    <h1>Message de&nbsp;: <?=$datas['fullname'] ?></h1>
    
    <div class="oneMail">      
          
            <p><?=$datas['created_at'] ?></p>          
            <p>Email : <?=$datas['mail'] ?></p>
            <p>Téléphone : <?=$datas['phone'] ?></p>
            <p><?=$datas['objet'] ?></p>
            <p id="mailContent"><?=$datas['content'] ?></p>
      
    </div>





  


</main>
<?php include ('footer.php'); ?>