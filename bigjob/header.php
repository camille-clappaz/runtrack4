<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigjob</title>
</head>

<body>
    <header>
        <nav class="menu">
            <?php if (!empty($_SESSION)) { ?>
                <a href="index.php">Accueil</a>
                <?php if ($_SESSION["statut"] == "administrateur" || $_SESSION["statut"] == "moderateur") { ?>
                    <a href="demande.php">Demandes de présence</a>
                <?php   } ?>
                <a href="calendrier.php">Calendrier</a>
                <a href="deconnexion.php">Deconnexion</a>
            <?php   } else { ?>
                <a href="index.php">Accueil</a>
                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>

            <?php } ?>
        </nav>
    </header>

</body>

</html>