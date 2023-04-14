<?php
require("bdd.php")
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
if(empty($_SESSION["statut"])){
    $getDemande= $bdd->prepare("SELECT `prenom`, `nom`, `date` FROM `utilisateurs` INNER JOIN `demande` WHERE utilisateurs.id=id_utilisateurs;");
    $getDemande->execute();
    $getDemande = $getDemande->fetchAll(PDO::FETCH_ASSOC);
    foreach($getDemande as $value){?>
        <p>L'utilisateur <?=$value["prenom"]." ". $value["nom"] ?> à fait une demande de présence pour le :<?= $value["date"] ?> </p>
<button id="accepter" name="accepter" type="accepter">Accepter</button><button id="refuser" name="refuser"type="refuser">Refuser</button>
    <?php }
}
?>
<script>
let yes = document.getElementById("accepter");
console.log(yes);
yes.addEventListener("click", ()=>{
    <?php
    $updateAccept= $bdd->prepare("UPDATE `demande` SET `validation`=? WHERE id=?");
    $updateAccept->execute(["accepte",$_SESSION["id"] ]);
    var_dump("yo");
    var_dump($_SESSION['id']);
 ?>
   
})

</script>
