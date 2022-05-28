<?php include ('header.php'); ?>

    <h1>Création de votre compte administrateur</h1>

    <h2>Administrateur</h2>
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
            <a href="/" title="retour à l'accueil">Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>
