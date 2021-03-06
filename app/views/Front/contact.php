<?php include ('header.php'); ?>

<?php if(isset($datas)){?>
    <p class='error'><?= $datas ?></p>
<?php  } ?>

<main class="container contact">
        <div class="formulaire">
            <h1>Contactez moi !</h1>
            <p>Une questions sur mon métier et mes services ? Ne restez pas dans le doute et posez-moi toutes vos questions !</p>
            <form action="index.php?action=contactPost" method="POST">

                <label for="fullname">Nom et prénom <span>*</span></label>
                <input type="text" id="fullname" name="fullname" placeholder="Nom et Prénom" value="<?php if(isset($_POST['fullname'])) echo htmlspecialchars($_POST['fullname']) ?>" required>

                <label for="email">E-mail <span>*</span></label>
                <input type="email" id="email" name="email" placeholder="Votre E-mail" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']) ?>" required>

                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone" value="<?php if(isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']) ?>">

                <label for="object">Objet</label>
                <input type="text" id="object" name="objet" placeholder="Objet de votre demande" value="<?php if(isset($_POST['objet'])) echo htmlspecialchars($_POST['objet']) ?>">


                <label for="content">Votre message <span>*</span></label>
                <textarea id="content" name="content" placeholder="Ecrivez votre message" required></textarea>

                <div class="bloc-rgpd">
                    <div id="clic-rgpd">
                        <p>RGPD <span>*</span></p>
                        <input type="checkbox" name="objet" id="inscription" value="inscription" required>
                        <label for="inscription" class="petit">J'accepte la politique de confidentialité</label>
                    </div>
                    <p id="confidentiel">
                        En cochant cette case et en soumettant ce formulaire, j'accepte que mes données personnelles
                        soient
                        utilisées pour me recontacter dans le cadre de ma demande indiquée dans ce formulaire. Les
                        informations
                        recueillies ne feront pas l’objet d’un traitement informatique autre que les finalités acceptées
                        ci-dessus.
                    </p>
                </div>

                <p class="needarea"><span>*</span> champs obligatoires</p>
                <input type="submit" value="Envoyer">

            </form>
        </div>
        <h2>Trouver le studio</h2>
        <p>Vous pouvez me retrouver ou m'écrire au : </p>
        <p>5 Pont des Indes</p>
        <p>56100 Lorient</p>
        <div id="geomap">
	    <!-- Ici s'affichera la carte -->
	    </div>

</main>

<?php include ('footer.php'); ?>