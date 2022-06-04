<?php include ('header.php'); ?>

<?php if(isset($datas)){?>
    <p class='error'><?= $datas ?></p>
<?php  } ?>
 
  <main id="connectAdmin">
    <h1>Bienvenue dans votre espace de connexion</h1>
    <div class="formAdmin">  
        <form action="indexAdmin.php?action=connexionAdmin" method="post">


          <label for="email">Email :</label>
          <input type="text" placeholder=" Votre email" name="email" id="email">

          <label for="password">Mot de passe :</label>
          <input type="password" placeholder=" Votre mot de passe" name="mdp" id="password">

          <input type="submit" value="Se connecter">

        </form>
        <a href="./" title="retour au site"><img src="./app/public/Administration/img/back-button.png" alt="fleche retour gauche"> Retour au site</a>     
    </div>
    <!-- <h2><a href="indexAdmin.php?action=createAdminPage">Création d'un compte</a></h2> -->
  </main>
</body>
</html>