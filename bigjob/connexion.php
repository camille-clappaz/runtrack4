<?php
session_start();
require("header.php");
include("bdd.php");

if (isset($_POST['connexion'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    $connectUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE prenom = ? AND nom = ? AND password = ?");
    $connectUser->execute([$prenom, $nom, $password]);

    if ($connectUser->rowCount() == 0) { ?>
        <script>
            alert("votre prenom, nom ou password est incorrect");
        </script>
    <?php
    } else {
        $connectUser = $connectUser->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION = $connectUser[0]; 
    header("Location: index.php");
    }
            } 
            // var_dump($_SESSION);   
                    ?>

<form id="connexion" action='' method='post'>
    <input id="prenom" type='text' name='prenom' placeholder="prenom">
    <input id="nom" type='text' name='nom' placeholder="nom">
    <input id="password" type='text' name='password' placeholder="password">
    <button type='submit' name='connexion'>Connexion</button><br>
</form>

<script src="./js/validConnexion.js"></script>