<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Se connecter</title>
  <link rel="stylesheet" href="/app/public/Administration/css/style.css">

</head>

<body>

<?php if(isset($datas)){?>
    <p class='error'><?= $datas ?></p>
<?php  } ?>
 
  <main id="connectAdmin">
    <h1>Bienvenue dans votre espace de connexion</h1>
    <div class="formAdmin">  
        <form action="indexAdmin.php?action=connexionAdmin" method="post">


          <label for="email">Email :</label></td>
          <input type="text" placeholder=" Votre email" name="email" id="email">

          <label for="password">Mot de passe :</label>
          <input type="password" placeholder=" Votre mot de passe" name="mdp" id="password">

          <input type="submit" value="Se connecter">

        </form>
        <a href="/"><img src="/app/public/Administration/img/back-button.png" alt=""> Retour au site</a>     
    </div>


    <h2><a href="indexAdmin.php?action=createAdminPage">Création d'un compte</a></h2>
  </main>
</body>

</html>