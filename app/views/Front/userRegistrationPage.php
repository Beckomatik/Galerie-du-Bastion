<?php include ('header.php'); ?>

<?php if(isset($datas)){?>
    <p class='error'><?= $datas ?></p>
<?php  } ?> 

<main class="forms userAccount">
    <h1>Je m'inscris pour profiter de plus de contenu !</h1>
    <form action="index.php?action=userRegistration" method="POST">

        <label for="lastname">Nom <span>*</span></label>
        <input type="text" placeholder="Nom" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'] ?>" required>

        <label for="firstname">Prénom <span>*</span></label>
        <input type="text" placeholder="Prénom" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'] ?>" required>

        <label for="pseudo">Pseudo <span>*</span></label>
        <input type="text" placeholder="Pseudo" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'] ?>" required>

        <label for="email">E-mail <span>*</span></label>
        <input type="email" id="email" name="email" placeholder="Votre E-mail" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']) ?>" required>

        <label for="password">Mot de passe <span>*</span></label>
        <input type="password" placeholder="Votre mot de passe" name="mdp" id="password" required>

        <label for="password">Confirmation du mot de passe <span>*</span></label>
        <input type="password" placeholder="Confirmez votre mot de passe" name="confirm_mdp" id="password" required>

        <p class="needarea"><span>*</span> champs obligatoires</p>
        <input type="submit" value="Envoyer">

    </form>

</main>

<?php include ('footer.php'); ?>