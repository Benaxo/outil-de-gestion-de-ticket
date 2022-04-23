<?php
    session_start();
    $login = $_SESSION["login"];
    if(!isset($login)){
        header("refresh:0;url=connexion.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestionnaire de ticket</title>
</head>
<body>
    <h4 class="title text-center">Bonjour <?php echo "<span class='text-primary'>".$login."</span>"; ?></h4>
    <hr>
    <table>
            <tr>
                <th colspan="4" class="text-center">Gestionnaire de tickets</th>
            </tr>
            <tr>
                <th class="">#</th>
                <th class="">Nom</th>
                <th class="text-center">Etat</th>
                <th class="text-center">Actions</th>
            </tr>
    
        <?php 
            $id = mysqli_connect("127.0.0.1","root","","gestionticket");
            mysqli_query($id,"SET NAMES 'utf8'");
            $req = "select * from ticket
                    order by id_t";
            $rep = mysqli_query($id,$req);
            $i = 1;
            $num = $_GET['num'];

            //N'hésitez pas à rafraichir la page ou à cliquer deux fois sur un bouton pour voir les modifications, n'ayant pas trouvé de bon moyen de rafraichir la page automatiquement sans beug ;)

            while($ligne = mysqli_fetch_array($rep)){
                echo "<tr><td>".$i."</td><td>"
                        .$ligne["nom_t"]."</td><td>"
                        ?>
                        
                        <?php
                             
                        echo "<p class='etat'>".$ligne["etat"]."</p>"."</td><td>"
                        ."<div class='mx-auto d-flex justify-content-center align-items-center'>"
                        ?>
                        <?php
                        if($ligne["etat"] == 'en attente'){//play + valider
                            
                            echo "<a href='ticket.php?num=".$ligne['id_t']."&play=true'><i class='far fa-play-circle'></i></a>"
                            ?>
                            <?php
                            $num = $_GET['num'];
                            
                            if(isset($_GET['play'])){
                                $req2 = "update ticket
                                        set etat = 'en cours'
                                        where id_t = '$num'";
                                $rep2 = mysqli_query($id,$req2);
                            }

                            echo"<a href='ticket.php?num=".$ligne['id_t']."&valider=true'><i class='far fa-check-circle'></i></a>
                            </div>"
                            ."</td>
                            </tr>";
                            if(isset($_GET['valider'])){
                                $req2 = "update ticket
                                        set etat = 'terminer'
                                        where id_t = '$num'";
                                $rep2 = mysqli_query($id,$req2);
                            }
                            
                        }else if ($ligne["etat"] == 'en cours'){//pause + valider
                           
                            echo "<a href='ticket.php?num=".$ligne['id_t']."&pause=true'><i class='far fa-pause-circle'></i></a>"
                            ?>

                            <?php
                            $num = $_GET['num'];
                            
                            if(isset($_GET['pause'])){
                                $req2 = "update ticket
                                        set etat = 'en attente'
                                        where id_t = '$num'";
                                $rep2 = mysqli_query($id,$req2);
                            }
                                echo "<a href='ticket.php?num=".$ligne['id_t']."&valider=true'><i class='far fa-check-circle'></i></a>
                                </div>"
                                ."</td></tr>";
                            
                                
                            

                        }else if($ligne["etat"] == 'terminer') {//play
                            
                            echo "<a href='ticket.php?num=".$ligne['id_t']."&play=true'><i class='far fa-play-circle'></i></a>
                            </div>"
                            ."</td></tr>";
                            $num = $_GET['num'];
                            
                            if(isset($_GET['play'])){
                                $req2 = "update ticket
                                        set etat = 'en cours'
                                        where id_t = '$num'";
                                $rep2 = mysqli_query($id,$req2);
                            }
                            
                        }

                $i++;
            }

                    

            
        ?>

    </table>
    <div class="button">    
            <a href="deco.php" class="btn text-light"> Déconnexion </a>
    </div><br><br> 
</body>
</html>