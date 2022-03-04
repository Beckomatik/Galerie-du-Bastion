<?php include ('header.php'); ?>

<main class="container">
        <div class="formulaire">
            <h2>Contactez moi !</h2>
            <p>Une questions sur mon métier et mes services ? Ne restez pas dans le doute et posez-moi toutes vos questions !</p>
            <form action="index.php?action=contactPost" method="POST">

                <label for="fullname">Nom et prénom <span><i class="fa-solid fa-star-of-life"></i></span></label>
                <input type="text" id="lname" name="fullname" placeholder="Nom et Prénom" required>

                <label for="email">E-mail <span><i class="fa-solid fa-star-of-life"></i></span></label>
                <input type="email" id="email" name="email" placeholder="Votre E-mail" required>

                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone">

                <label for="object">Objet</label>
                <input type="text" id="object" name="object" placeholder="Objet de votre demande">


                <label for="content">Votre message <span><i class="fa-solid fa-star-of-life"></i></span></label>
                <textarea id="content" name="content" placeholder="Ecrivez votre message" style="height:200px" required></textarea>

                <input type="submit" value="Envoyer">

            </form>
        </div>

</main>

<?php include ('footer.php'); ?>