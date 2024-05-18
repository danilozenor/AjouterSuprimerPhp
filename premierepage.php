<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ma page web</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <form action="" method="post">
        <div class="div">
            <img src="image.jpg" alt="mon image"><br>
            <h2>connecter vous</h2>
            <p>
                <label for="nom">Username</label><br>
                <input type="text" name="nom" id="nom" placeholder="Enter your username">
            </p>
            <p>
                <label for="pass">Password</label><br>
                <input type="text" name="pass" id="pass" placeholder="Enter your password" >
            </p> 
            <a href="oublier.html" class="oublier">mot de passe oublier ?</a>
            <input type="submit" name="envoie" value="Login" id="">
            <h5>je n'ai pas de compte ? <a href="creer.html" class="creer">creer un compte</a></h5>
        </div>  
    </form>






    <?php
    $serveur = "localhost";
    $db = "test1";
    $login = "root";
    $pass = "";


    try 
    {
        try{
            $connexion = new PDO("mysql:host=".$serveur.";dbname=".$db.";",$login,$pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  echo "Connection a la base de donnee reussi";
        }
        catch(Exception $e)
        {
            echo "".$e->getMessage()."";
        }
        if (isset($_POST["envoie"])) 
        {
            $name=$_POST["nom"];
           $pass=$_POST["pass"];
           $insertion ="INSERT INTO utilisateur (nom,password)
                VALUES ('$name','$pass')";
             $connexion->exec($insertion);
            

            // $requete = $connexion-> prepare("
            // SELECT * FROM utilisateur");
            // $requete -> execute();

            //$resultat = $requete->fetchAll();

         }    
         
        
    }
    catch (PDOException $e)
    {
        echo "echec de la connection"  .$e->getMessage();
    }
    ?>
</body>
</html>