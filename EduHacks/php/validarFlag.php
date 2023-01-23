<?php

session_start();
    if(!isset($_SESSION["nomUsuari"])){
        header("Location:../іndex.php");
    }
    else{
        $nomUsuari = $_SESSION["nomUsuari"];
    }





if ($_SERVER['REQUEST_METHOD']=="POST"){

    
    if(isset($_POST["idctf"]) && isset($_POST["iduser"]) && isset($_POST["flag"])){
        include("connectDB.php");
        $idCtf =$_POST["idctf"];
        $userflag =$_POST["flag"];
        $flag = getflagformid($idCtf);
        $n=0;

        if($_GET["contingut"] != ""){
            $actual=$_GET["contingut"];
        }else{
            $n = 1;
        }


    
        if($flag == $_POST["flag"]){  
            $scoreCTF = getscoreformid($idCtf);
            $scoreActualUser= getscoreactualuser($_POST["iduser"]);
            echo $scoreActualUser;
            echo $scoreCTF;
            $scoreActualUser= $scoreActualUser + $scoreCTF;
            #alert que esta bien
            updatescoreUser($_POST["iduser"],$scoreActualUser);
            updatectfcompleted($_POST["iduser"],$idCtf);

            if($n==1){
                header("Location:../html/home.php");
            }
            else{
                header("Location:../html/home.php?contingut=$actual");
            }
            
        }elseif($flag != $_POST["flag"]){
            #alert que esta mal
            if($n==1){
                header("Location:../html/home.php");
            }
            else{
                header("Location:../html/home.php?contingut=$actual");
            }
            
        }

 
    }
}
else{
    header("Location:../html/home.php"); 
}

?>