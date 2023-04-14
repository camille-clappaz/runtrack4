<?php
session_start();
require("bdd.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigjob</title>
</head>

<body>
    <header><?php require("header.php"); ?></header>
    <main>
        <?php
        if (!empty($_SESSION)) { ?>
            <h1>Demande de présence</h1>
            <form id="presence" action="" method="post">
                <label for="date">Choississez votre date:</label>
                <input type="datetime-local" name="date" id="date">
                <button type="submit" name="validDate" value="">Valider date</button>
            </form>

            <div class="erreur"></div>


        <?php
            if (isset($_POST['validDate'])) {
                $date = $_POST["date"];
                $id = $_SESSION['id'];
                $demandeDate = $bdd->prepare("INSERT INTO demande(date, id_utilisateurs, validation)VALUES(?,?, ?)");
                $demandeDate->execute([$date, $id, "0"]);
            }
        }

        ?>

    </main>
    <script src="./js/validDate.js"></script>
</body>

</html>