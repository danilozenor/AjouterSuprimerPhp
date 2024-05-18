<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="1">
    <th>Username</th>
    <th>Password</th>
    <th>Actions</th>

<?php
    $serveur = "localhost";
    $db = "test1";
    $login = "root";
    $pass = "";

        try {
            $connexion = new PDO("mysql:host=$serveur;dbname=" .$db . ";", $login, $pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             $requete = $connexion-> prepare("
             SELECT * FROM utilisateur");
             $requete -> execute();

            $resultat = $requete->fetchAll();

            echo"<pre>";
            print_r($resultat);
            echo "</pre>";

            foreach ($resultat as $row) {
                // echo "".$row["username"]."<br/>";
                ?>
                <tr><td><?php echo $row["nom"] ?></td>
                <td><?php echo $row["password"]?></td>
                <td><a href="supprrimer.php?id=<?php echo $row["id"]?>"> supprimer</a></td></tr>
                <?php
                // echo "<tr>".$row["username"]."<tr/>
                // <tr>".$row["password"]."<tr/>";
            }
                

        } 
        catch (Exception $e) {
            echo "Echec" . $e->getMessage() . "";
        }

?>

</table>

</body>
</html>