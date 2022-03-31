<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Se connecter</title>
</head>

<body>
  <h1>Bienvenue dans votre espace de connexion</h1>
  <div id="inscription">
    <div>
      <form action="indexAdmin.php?action=connexionAdmin" method="post">


        <label for="email">email :</label></td>
        <input type="text" placeholder="votre email" name="email" id="email">

        <label for="password">Mot de passe :</label>
        <input type="password" placeholder="votre mot de passe" name="mdp" id="password">

        <input type="submit">

      </form>
      <a href="/">Retour à l'accueil</a>
    </div>
  </div>


  <h2><a href="indexAdmin.php?action=createAdminPage">Création d'un compte</a></h2>
</body>

</html>