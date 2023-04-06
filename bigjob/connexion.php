<?php
require("header.php");
include("bdd.php");
require('User.php');


if (isset($_POST["connexion"])) {
    $user = new User($_POST['prenom'],$_POST['nom'], '', $_POST['password']);
    $user->connect($_POST['prenom'],$_POST['nom'], $_POST['password'],$bd);
    $user->isConnected();

}


var_dump($_SESSION);
?>

<form action='' method='post'>
    <input type='text' name='prenom' placeholder="prenom">
    <input type='text' name='nom' placeholder="nom">
    <input type='text' name='password' placeholder="password">
    <button type='submit' name='connexion'>Connexion</button><br>
</form>
