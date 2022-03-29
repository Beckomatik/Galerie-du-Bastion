<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Création de votre compte administrateur</h1>

    <h1>Administrateur</h1>
    <div id="inscription">
        <div>
            <form action="indexAdmin.php?action=createAdmin" method="post">
               
                       <label for="lastname">Nom</label>
                        <input type="text" placeholder="Nom" name="lastname" id="lastname">

                       <label for="firstname">Prénom</label>
                        <input type="text" placeholder="Prénom" name="firstname" id="firstname">
                    
                        <label for="email">email :</label>
                        <input type="text" placeholder="votre email" name="email" id="email">
                   
                        <label for="password">Mot de passe :</label>
                        <input type="password" placeholder="votre mot de passe" name="mdp" id="password">
                   
                        <input type="submit">
                 
            </form>
            <a href="/">Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>
