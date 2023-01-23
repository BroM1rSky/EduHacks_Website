<?php
    include("./php/connectDB.php");
    $CTF=lastctf();
    $titolCtf = $CTF["title"];
    $descripcioCtf = $CTF["description"];
    $flagCtf = $CTF["flag"];
    $categoria = $CTF["categoryName"];
    $fichero=$CTF["fileName"];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduHacks Home</title>
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/ultimoCtf.css">

    
</head>
   
<body>
    <nav>   
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>         
        <a href="./index.php" class="home">
            <h1 class="title" data-text="Edu Hacks"><span>Edu Hacks</span></h1>
        </a>
        <ul>
            <li><a class="active" href="./html/login.php">Iniciar Sessió</a></li>
            <li><a href="./html/register.html">Registre</a></li>
            <li><a href="#primer">CTF</a></li>
            <li><a href="#nosaltres">Informació</a></li>
        </ul>    
    </nav>
    <section class="section1">
        <br>
        <br>
        <br>
        <br>
        <div>
            <p class="titulo">Benvingut a Edu Hacks!</p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="seccio1">
            <br>
            
            <p>Vols aprendre hacking ètic? T'agrada la ciberseguretat? Vols pasar
                una estona divertida? <br/> <br/> Si la teva resposta
                és un sí! <br><br>
            <h2 data-text="AQUESTA PAGINA WEB ES PER TU!"><span>Aquesta pagina web és per tú!</span></h2>
            </p>
        </div>
    </section>
    
    <div class="separar">
        <div class="uno">
            <img id="uno" src="./img/lados.gif" alt="">
        </div>
        <div class="dos">
        
                <div id="primer" class="sub1-subparte2">
                    <h2>Que són els CTF?</h2>
                </div>
                <div class="sub2-subparte2">
                    <p>
                        Els CTF o Capture The Flag són una sèrie de desafiaments informàtics enfocats a la seguretat.
                        Tenen com a objectiu aprendre i millorar les competències d'un Hacker o equips de Hackers.
                    </p>
                </div> 
        </div>
        <div class="tres">
            <img id="dos" src="./img/lados.gif" alt="">
        </div>
        
 <section class="section2">
    <div class="parte2">
        <div class="subparte1">
            <div class="sub-parte1">
            </br>
                <img id="ctfImg" src="./img/ctfs.jpg" alt="">
                <div>
                <a href="./html/login.php?redirect=yes"><h3 class="jugar">Començar a jugar Ara !</h3></a> 
                </div>
            </div>
            
        </div>
        <div class="subparte2">
            <a href="./html/login.php?redirect=yes">
                <p class="FotoEnigma">
                </p>
                <p class="enigma">FES CLICK AQUÍ I CREA EL TEU PROPI CTF!</p></a>
        </div>
    </div>
 </section>

    <div class="separar2">
            <h3 class="competir">Competeix amb jugadors de tot el mon! I demostra, que ets el millor!</h3>
    </div>

    <section class="section3"> 
                <div class="ctf">
                    <h3 class="titol"><?php echo $titolCtf;  ?></h3>
                    <h3 class="descripcio"><?php echo $descripcioCtf;?></h3>
                     
                    <?php if(!$CTF["fileName"] == ""){
                                echo"<a href='".$CTF["filePath"]."'"."download=".$CTF["fileName"]."><h2 class='accedir'>Descarregar Contingut</h2></a>";}
                    ?> 
                        <h3 class="puntuacio"><?php echo "SCORE: ".$CTF["score"];?></h3>
                        <form class="formulari">
                            <a class="flag" href="./html/login.php?redirect=yes">COMPLETAR REPTE</a>
                        </form>
                    </div>  
                    <h2 class="dir_ultim">Darrer repte CTF! <br><=============</h2>
                    <h2 class="dir_ultim_movil">Darrer repte CTF!</h2>
    </section>
    <section class="section4">
        <h3 class="titol_own">Sobre Nosaltres: </h3>
        <h4 id="nosaltres" class="nosaltres">
            Som  un  grup  de  dos  alumnes  del  cicle  superior  ASIX, Dmytro Bromiskyi  i Axel Ariza.<br><br>Estem  compromesos  a  realitzar  un 
            projecte  digne  de  l'aprovació  del  nostre  professor  David  Gònzalez.<br><br> Ens  serveix  amb  una  aprovació  de  la  nota  del  curs,
            no  fa  falta  la  teva  aprovació  personal, Ja que  sabem  que  és  molt  díficil  d'aconseguir. <br><br> Dit  aixó, aquest  projecte  de PHP 
            està  enfocat  en  la  creació  de  reptes  Capture  The  Flag,  i  la  seva  posterior  resolució  del  repte.
        </h4>
    </section>
</body>
    <footer>
        <div id="footer">
            <h3 class="info">EduHacks &copy; 2022 By Axel Ariza and Dmytro Bromirskyi</h1>
        </div>
    </footer>
</html>