<?php
    session_start();
if(!isset($_SESSION["nomUsuari"])){
    header("Location:./іndex.php");
  }

else{
    $nomUsuari = $_SESSION["nomUsuari"];
}

include("../php/connectDB.php");
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
        <link rel="stylesheet" href="../css/logout.css">
        <link rel="stylesheet" href="../css/home.css">


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
                <li><a href="../html/introduirMail.html">Canviar Password</a></li>
                <li><a href="#separar">Els Meus CTFS</a></li>
                <li><a href="../php/logout.php">Tancar Sessió</a></li>
            </ul>    
        </nav>

        <section class="Principal">
            <div class="central-1">
                <div class="dreta">
                    <p class="user"><?php echo $nomUsuari; ?></p>    
                </div>
                <div class="esquerra">
                    <div class="imatge">
                        <?php 
                            $InfoUser = getInfoUser($nomUsuari);
                            foreach($InfoUser as $info){}
                            if($info["imgName"]==""){
                                echo '<img src="../img/sense-foto.png" alt="sense perfil">';
                            }
                            elseif($info["imgName"]!=""){
                                echo "<img src='../uploads/".$info["imgName"]."' alt='amb perfil'>";
                            }
                        ?>
                        <p>Canviar Imagen..</p>
                        <form action="../php/actualitzarPerfil.php" method="POST" enctype="multipart/form-data">
                            <label for="iFile"></label>
                            <input id="iFile" name="archivo" type="file"/><br>
                            <input class="enviar" type="submit" name="register" >
                        </form>
                    </div>
                    <div class="personal">
                        <?php 
                            $InfoUser = getInfoUser($nomUsuari);
                            foreach($InfoUser as $info){}
                        
                            echo "<p class='informacio'>Nom:".$info["userFirstName"]."</p>";
                            echo "<p class='informacio'>Cognom:".$info["userLastName"]."</p>";
                            echo "<p class='informacio'>Correu:<br>".$info["mail"]."</p>";
                            echo "<p class='informacio'>Punts:".$info["userScore"]."</p>";
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <div id="separar" class="separarApartats">
            <p>
               <h2>Aquets son els teus propis CTFS:</h2> 
             </p>
        </div>
        <section class="Secundari">
            <br><br><br><br><br>
        <?php
            $iduser = getiduser($nomUsuari);
            $retos = getretosuser($iduser);

            foreach($retos as $reto) {
                echo "<div id='ctfs'>";
                    echo "<div class='ctfs2'>";
                        echo "<div class='ctf'>";
                            echo "<h3 class='titol'>".$reto["title"]."</h3>";
                            echo "<p class='descripcio'>".$reto["description"];
                            if(!$reto["fileName"] == ""){
                                echo"<a href='".$reto["filePath"]."'"."download=".$reto["fileName"]."><h2 class='accedir'>Descarregar Contingut</h2></a>";
                            }
                            echo "</p>";
                            echo "<p class='puntuacio'>SCORE: ".$reto["score"]."</p>";
                            echo "<p class='flagEnSi'>FLAG{ ".$reto["flag"]." }</p>";    
                        echo "</div>";
                    echo "</div>"; 
                echo "</div>";  
            }
        ?>
        <br><br><br>
        </section>
        <footer>
        <div id="footer">
            <br><br><br><br><br>
            <p>EduHacks &copy; 2022 By Axel Ariza and Dmytro Bromirskyi</p>
        </div>
    </footer>
 </body>

</html>