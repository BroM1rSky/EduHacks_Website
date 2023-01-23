<?php
    session_start();
if(!isset($_SESSION["nomUsuari"])){
    header("Location:./іndex.php");
  }

else{
    include("../php/connectDB.php");
    $nomUsuari = $_SESSION["nomUsuari"];
    $cont= getcontcategory();
    $categorias= getnamecategory();
    $BestCategory= GetBestCategory();
    $iduser= selectiduser($nomUsuari);

}

?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>EduHacks Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/home.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/PintarCTFS.css">
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
                <li><a href="../html/logoutPage.php">Perfil</a></li>
                <li><a href="../html/ctf.php">Crear CTFS</a></li>
                <li><a href="../html/ranking.php">Puntuació</a></li>
            </ul>    
        </nav>
        <section class="principio">
            <h2 class="saludos">Benvingut Al CyberEspai EduHacks</h2>
            <br><br>
        <?php
            echo "<br><h1  class='usuariName' data-text='$nomUsuari'><span>$nomUsuari</span></h1>";    
        ?>
            <br><br>
        </section>
        <div class="separar">
            <h1 class="titol2">Lets Go to capture some flags! </h1>
        </div>
        
        <div class="joc">
            <div class="categorias">
                <div class="flotante">
                    <ul class="categorys">
                        <?php
                            foreach($categorias as $categoria){
                                echo "<a href='home.php?contingut=$categoria[0]'>$categoria[0]</a></br></br>";
                            }
                                
                        ?>
                    </ul>
                </div>
            </div>
            <div id="ctfs">
            <div>
         </div>
                <?php
                    if(isset($_GET["contingut"])){
                        $actual = $_GET["contingut"];
                        $actualPagina = $_GET["contingut"];
                        echo"<h3 class='millorCtfs'>CATEGORIA ACTUAL: $actual</h3>";
                        echo"<br><br>"; 
                    }
                    else{
                        foreach($BestCategory as $categoria){
                            $actual=$categoria[0];
                            $actualPagina = "";
                        }
                        echo"<h3 class='millorCtfs'>CATEGORIA MÉS POPULAR:$actual</h3>";
                        echo"<br><br>";  
                    }

                    $getctf=getctfs();
                
                    echo "<div class='ctfs2'>";
                    foreach($getctf as $ctf) {
                        $categoria = $ctf["categoryName"];
                        if($categoria == $actual){
                            echo "<div class='ctf'>";
                            echo "<h3 class='titol'>".$ctf["title"]."</h3>";
                            echo "<p class='descripcio'>".$ctf["description"];
                            if(!$ctf["fileName"] == ""){
                                echo"<a href='".$ctf["filePath"]."'"."download=".$ctf["fileName"]."><h2 class='accedir'>Descarregar Contingut</h2></a>";
                            }
                            echo "</p>";

                            echo "<p class='puntuacio'>SCORE: ".$ctf["score"]."</p>";

                            if($iduser == $ctf["iduser"] || getctfcompleted($iduser,$ctf["idctf"])){
                                echo "<p class='validat'>VALIDAT!<p class='flagEnSi'>FLAG{ ".$ctf["flag"]." }</p></p>";       
                            }else{
                                #form submit
                                echo "<form  class='formulari' action='../php/validarFlag.php?contingut=$actualPagina' method='POST'>";
                                echo "<input type='hidden' name='idctf' value='".$ctf["idctf"]."'>";
                                echo "<input type='hidden' name='iduser' value='".$iduser."'>";
                                echo '<input class="flag" type="text" id="flag" name="flag" placeholder="Introduiex la Flag!"><br><br>';
                                echo "<input class='enviar' type='submit' value='Validar!'>";
                                echo "</form>";
                                
                                
                            }
                            echo "</div>";
                        }
                        }
                    
                    echo "</div>";

                ?>
    
               
            </div>
        </div>
      
    </body>

    <!--
    <footer>
        <div id="footer">
            <br><br><br><br><br>
            <p>EduHacks &copy; 2022 By Axel Ariza and Dmytro Bromirskyi</p>
        </div>
    </footer>
                    -->

</html>