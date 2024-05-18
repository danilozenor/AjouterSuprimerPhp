<?php
    $serveur = "localhost";
    $db = "test1";
    $login = "root";
    $pass = "";

        try {
            $id=$_GET["id"];
            $connexion = new PDO("mysql:host=$serveur;dbname=" .$db . ";", $login, $pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $suppr = "DELETE FROM utilisateur WHERE id=$id";
            
           $requete=$connexion->prepare($suppr);
           $requete->execute();
           header("location:affichersupp.php") ;
            echo "Informations Updated";

        } 
        catch (Exception $e) {
            echo "Echec" . $e->getMessage() . "";
        }

       