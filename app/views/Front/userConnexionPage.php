<?php include ('header.php'); ?>

<?php if(isset($datas)){?>
    <p class='error'><?= $datas ?></p>
<?php  } ?> 
 
 
<main class="forms userAccount">
   
        <h1>Connectez-vous à votre compte</h1>
        <form action="index.php?action=userConnexion" method="POST">

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Votre e-mail" >
            
            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Votre mot de passe" name="mdp" id="password" >

            <input type="submit" value="Se connecter">

        </form>
    </div>
    <div class="userRegistration">
        <h2>Pas encore de compte ? Inscrivez-vous pour accéder à plus de contenu !</h2>
        <a href="index.php?action=userRegistrationPage">Je m'inscris !</a>
    </div>

    

</main>

<?php include ('footer.php'); ?>