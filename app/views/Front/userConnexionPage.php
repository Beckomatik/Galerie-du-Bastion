<?php include ('header.php'); ?>

<main class="forms" id="connexionUser">
    <div class="userConnexion">
        <h1>Connectez-vous à votre compte</h1>
        <form action="index.php?action=userConnexion" method="POST">

            <label for="email">E-mail <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Votre E-mail">
            
            <label for="password">Mot de passe <span>*</span></label>
            <input type="password" placeholder="votre mot de passe" name="mdp" id="password">

            <p class="needarea"><span>*</span> champs obligatoires</p>
            <input type="submit" value="Envoyer">

        </form>
    </div>
    <div class="userRegistration">
    <h2>Pas encore de compte ? Inscrivez-vous pour accéder à plus de contenu !</h2>
    <button><a href="index.php?action=userRegistrationPage">Je m'inscris !</a></button>
    </div>

    

</main>

<?php include ('footer.php'); ?>