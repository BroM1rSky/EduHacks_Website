<?php
    session_start();
if(!isset($_SESSION["nomUsuari"])){
    header("Location:./іndex.php");
  }

else{
    $nomUsuari = $_SESSION["nomUsuari"];
}

include '../php/connectDB.php';
$ranking = getranking();
$winner = getWinner();
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/ranking.css">
    </head>

    <body>
        <nav>   
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>         
            <a href="../html/home.php" class="home">
                <h1 class="title" data-text="EduHacks"><span>EduHacks</span></h1>
            </a>
            <ul class="menu">
                <li><a href="../php/logout.php">Perfil</a></li>
                <li><a href="../html/home.php">Competir</a></li>
                <li><a href="../php/logout.php">Tancar Sessió</a></li>
            </ul>    
        </nav>

        <section class="rankingPrincipal">
        <h3 class="titulo" data-text="ranking!"><span>RANKING EDUHACKS</span></h3> <br>

            <div class="tabla-ranking">
                <?php
                    
                    $i=0;
                    
                    foreach($ranking as $user){
        
                        echo "<p class='ranking_user'><h3 class='nickUser'>$user[2]</h3><h3 class='scoreUser'>".$user["userScore"]."";
                        
                        if($user["imgName"]==""){
                            echo '</h3><img class="FotoUser "src="../img/sense-foto.png" alt="sense perfil">';
                        }elseif($user["imgName"]!=""){
                            echo "</h3><img class='FotoUser' src='../uploads/".$user["imgName"]."' alt='amb perfil'>";
                        }  
                        if($i<3){
                            echo '<img class="Posicio" src="../img/'.$i.'.jpg" alt="guanyadors"><br></p>';
                            $i++;
                        }
                        else{
                            echo '<img class="Posicio" src="../img/loser.jpg" alt="guanyadors"><br></p>';
                        }
                        
                    }
                       
                    
                    $i+=1;
                    
                    
                ?>
                </div>
                <?php foreach($winner as $win){} ?>
                <div class="salutacioDiv">
                    <strong class="salutacio">Enhorabona <?php echo $win["username"];?>!</strong>
                </div>
            </div>
     </section>
    </body>

</html>