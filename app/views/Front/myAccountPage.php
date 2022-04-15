<?php include ('header.php'); ?>

<main class="container">
<?php if(isset($_SESSION['id'])){?>
    <h1>Bienvenue de votre espace utilisateur <?= $_SESSION['pseudo'] ?> 🙂 !</h1> 
    <h2>Vos commentaires :</h2>


<?php } ?>


</main>

<?php include ('footer.php'); ?>