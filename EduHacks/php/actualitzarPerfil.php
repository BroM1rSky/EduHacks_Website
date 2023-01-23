<?php 
    include("../php/connectDB.php");
    require_once("../php/funcions.php");
    
    session_start();
    if(!isset($_SESSION["nomUsuari"])){
        header("Location:./іndex.php");
    }
    else{
        $nomUsuari = $_SESSION["nomUsuari"];
    }


    if ($_SERVER['REQUEST_METHOD']=="POST"){


        $nomImatge = $_FILES["archivo"]["name"];
        $nomCod = hash('sha256',$nomImatge);
        $nomFinal = $nomCod.$nomImatge;
        $rutaCod = "../uploads/".$nomFinal;

        $iduser = selectiduser($nomUsuari);
        
        updateAvatar($nomFinal,$iduser);

        move_uploaded_file($_FILES["archivo"]["tmp_name"],$rutaCod);

        header("Location:../html/logoutPage.php");
    }
    else{
        header("Location:.");
    }

?>