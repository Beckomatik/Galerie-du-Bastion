<?php include ('header.php'); ?>

<main class="forms userAccount">
    <h1>Je m'inscris pour profiter de plus de contenu !</h1>
    <form action="index.php?action=userRegistration" method="POST">

        <label for="lastname">Nom <span>*</span></label>
        <input type="text" placeholder="Nom" name="lastname" id="lastname">

        <label for="firstname">Prénom <span>*</span></label>
        <input type="text" placeholder="Prénom" name="firstname" id="firstname">

        <label for="pseudo">Pseudo <span>*</span></label>
        <input type="text" placeholder="Pseudo" name="pseudo" id="pseudo">

        <label for="email">E-mail <span>*</span></label>
        <input type="email" id="email" name="email" placeholder="Votre E-mail" required>

        <label for="password">Mot de passe <span>*</span></label>
        <input type="password" placeholder="Votre mot de passe" name="mdp" id="password">

        <label for="password">Confirmation du mot de passe <span>*</span></label>
        <input type="password" placeholder="Confirmez votre mot de passe" name="confirm_mdp" id="password">

        <p class="needarea"><span>*</span> champs obligatoires</p>
        <input type="submit" value="Envoyer">

    </form>

</main>

<?php include ('footer.php'); ?>