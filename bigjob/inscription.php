<?php
session_start();
require("header.php");
include("bdd.php");
?>

<form id="inscription" action="" method="post">
    <input id="prenom" type="text" name="prenom" placeholder="prenom"><br>
    <input id="nom"  type="text" name="nom" placeholder="nom"><br>
    <input id="email"  type="text" name="email" placeholder="email"><br>
    <input id="password"  type="text" name="password" placeholder="password"><br>
    <input id="confirm_password"  type="text" name="confirm_password" placeholder="confirm_password"><br>
    <button type="submit" name="submit">S'inscrire</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $prenom = $_POST['nom'];
    $nom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insertUser = $bdd->prepare("INSERT INTO utilisateurs(prenom,nom,email,password)VALUES(?,?,?,?)");
    $insertUser->execute([$nom, $prenom, $email, $password]);
}
if (isset($_POST['submit'])) {
    $allowed_domain = 'laplateforme.io';
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Extraire le domaine de l'adresse e-mail
    $domain = substr(strrchr($email, "@"), 1); // strrchr($email, "@"); =>@***.**


    // Vérifier si le domaine est autorisé
    if ($domain !== $allowed_domain) {
        ?>
        <script>alert("Il faut une adresse mail de laPlateforme");</script>
        <?php 
    } else {
            $insertUser = $bdd->prepare("INSERT INTO utilisateurs(prenom,nom,email,password)VALUES(?,?,?,?)");
            $insertUser->execute([$nom, $prenom, $email, $password]);
            header("Location: connexion.php");
    }
}

?>
<script src="./js/validInscription.js"></script>