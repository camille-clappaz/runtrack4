<?php
session_start();
require("header.php");
include("bdd.php");
?>

<form action="" method="post" onsubmit="validInscription()">
    <input type="text" name="prenom" placeholder="prenom"><br>
    <input type="text" name="nom" placeholder="nom"><br>
    <input type="text" name="email" placeholder="email"><br>
    <input type="text" name="password" placeholder="password"><br>
    <input type="text" name="confirm_password" placeholder="confirm_password"><br>
    <button type="submit" name="submit">S'inscrire</button>
</form>
<?php
if (isset($_POST['submit'])) {
    $prenom = $_POST['nom'];
    $nom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['mdp'];

    $insertUser = $bdd->prepare("INSERT INTO utilisateur(prenom,nom,email,password)VALUES(?,?,?,?)");
    $insertUser->execute([$nom, $prenom, $email, $password]);
}
if (isset($_POST['submit'])) {
    $allowed_domain = 'laplateforme.io';
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['password'];

    // Extraire le domaine de l'adresse e-mail
    $domain = substr(strrchr($email, "@"), 1); // strrchr($email, "@"); =>@***.**


    // Vérifier si le domaine est autorisé
    if ($domain !== $allowed_domain) {
        echo "Il faut une adresse mail de laPlateforme";
    } else {
        if ($_POST["password"] == $_POST["confirm_password"]) {
            $insertUser = $bdd->prepare("INSERT INTO utilisateur(prenom,nom,email,password)VALUES(?,?,?,?)");
            $insertUser->execute([$nom, $prenom, $email, $password]);
        } else {
            echo "Les mots de passe ne sont pas identiques!";
        }
    }
}
if (isset($_POST['submit'])) {
    $prenom = $_POST['nom'];
    $nom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['mdp'];

   
}
?>