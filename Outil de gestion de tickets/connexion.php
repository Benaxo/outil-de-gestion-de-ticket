<?php
session_start(); 

if(isset($_POST["bout"]))
{
    $id = mysqli_connect("127.0.0.1","root","","gestionticket");
                           
    $login = mysqli_real_escape_string($id,$_POST["login"]);
    $mdp = mysqli_real_escape_string($id,$_POST["mdp"]);
    $_SESSION["login"]=$login;
    mysqli_query($id,"SET NAMES 'utf8'");
    $req = "select * from user 
                where login='$login' and mdp='$mdp'"; 
    $rep= mysqli_query($id,$req);

    if(mysqli_num_rows($rep)>0)
    {
        header("location:ticket.php?num=0");
    }
    else
    {
        $erreur = "<span class='text-danger fs-4 text'>Erreur de login ou de mot de passe</span>";                         

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper fadeInDown">
    <div id="formContent">
        <h1 class="mt-3">Connexion</h1><hr>
        <form action="connexion.php" method="post">
            <?php
                if(isset($erreur)) echo "<h3>$erreur</h3>";
            ?>
            <input type="text" name="login" class="fadeIn second" placeholder="Login :">
            <input type="password" name="mdp" class="fadeIn third" placeholder="Mot de passe :">
            <input type="submit" value="Connexion" class="fadeIn fourth" name="bout"><br><br>
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="#">Mot de passe oublié?&nbsp;&nbsp;&nbsp;</a>
            <a class="underlineHover" href="#">S'Inscrire</a>
        </div>
    </div>
    </div>
</body>
</html>