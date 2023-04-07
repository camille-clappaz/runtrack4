<?php

        $username = "root";
        $password = "";
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=bigjob;charset=utf8mb4", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully" . "<br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        ?>
        