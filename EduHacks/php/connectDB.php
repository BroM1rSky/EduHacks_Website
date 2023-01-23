<?php

#0.Establir Connexió DB
#1.COUNT categories
#2.Obtenir el nom de les categories
#3.Obtenir la categoria amb més CTFS
#4.Comprobació usuaris
#5.Selecciona ID usuari
#6.Insertar Categoria
#7.Insertar CTF
#8.COUNT ctfs
#9.GET CTFS
#10.Obtenir dades usuaris
#11.Insertar  usuari
#12.Últim Login
#13.Obtenir l'últim ctf
#14.Obtenir id CTF
#15.Obtenir score idctf
#16.Obtenir score actual del usuari
#17.Actualitzar score del usuari
#18.Actialitzar foto usuari
#19.Insertar tabla CTF completat
#20.Obtenir ctf completat per usuari
#21.Obtenir ranking de usuaris
#22.Obtenir reptes usuari 
#23.Obtenir id de usuari


    #0
    function connectDB(){
        $conectar_database = 'mysql:dbname=eduhacks;host=localhost:3306';
        $usuario = 'root';
        $password = '';
        try{
            $db = new PDO($conectar_database, $usuario, $password, 
                            array(PDO::ATTR_PERSISTENT => true));
        }catch(PDOException $sms){
            echo 'ALERT! DATABASE ERROR!: ' . $sms->getMessage();
        }
        return $db;
    }

    #1
    function getcontcategory(){
        $db = connectDB();
        $obtenerContador = "SELECT count(DISTINCT `categoryName`) as contador FROM `ctfs`  WHERE `categoryName` <> '';";
        $contadorCategorias = $db->prepare($obtenerContador);
        $contadorCategorias->execute();
        $contador = $contadorCategorias->fetch(PDO::FETCH_ASSOC);
        $cont = $contador['contador'];
        return $cont;
    }   

    #2
    function getnamecategory(){
        $db = connectDB();
        $ConsultarCategorias = "SELECT  DISTINCT `categoryName` FROM `ctfs`  WHERE `categoryName` <> '';";
        $categorias = $db->prepare($ConsultarCategorias);
        $categorias->execute();
        return $categorias;
    }   

    #3
    function GetBestCategory(){
        $db = connectDB();
        $GetBestCategory = "SELECT `categoryName`, count(*) as `total` FROM `ctfs` GROUP BY `categoryName` ORDER BY 2 DESC LIMIT 1;";
        $BestCategoryCtf = $db->prepare($GetBestCategory);
        $BestCategoryCtf->execute();
        
        return $BestCategoryCtf;
    }

    #4
    function ComprobarUsuarios($username){
        $db=connectDB();
        
        $sql='SELECT username FROM `users` WHERE username= :rol';
        $Comprobar_Usuario = $db->prepare($sql);
        $Comprobar_Usuario->execute(array(':rol' =>$username));
        if($Comprobar_Usuario){
            $usuario= $Comprobar_Usuario->rowcount()>0 ? true : false;
        }
        return $usuario;
        
    }

    #5
    function selectiduser($username){
        $db=connectDB();
        $sql='SELECT iduser FROM `users` WHERE username= :rol';
        $iduser = $db->prepare($sql);
        $iduser->execute(array(':rol' =>$username));
        if($iduser){
            foreach($iduser as $id){
                $iduser = $id['iduser'];
            }
            return $iduser;  
        }
        
    }


    #6 
    function insertcategory($category){
        $db=connectDB();
        $sql='INSERT INTO `categorys` (`categoryName`) VALUES (:category)';
        $insertcategory = $db->prepare($sql);
        $insertcategory->execute(array(':category' =>$category));
    }

    #7
    function insertctf($title,$description,$flag,$iduser,$filename,$filepath,$category,$score){
        $db=connectDB();
        $sql='INSERT INTO `ctfs` (`title`, `description`, `flag`, `iduser`, `fileName`, `filePath`,`categoryName`,`score`,creationDate) VALUES (:title,:description,:flag,:iduser,:filename,:filepath,:category,:score,NOW())';
        $insertctf = $db->prepare($sql);
        $insertctf->execute(array(':title' =>$title,':description' =>$description,':flag' =>$flag,':iduser' =>$iduser,':filename' =>$filename,':filepath' =>$filepath,':category' =>$category,':score' =>$score));

    }

    #update profile avatar

    #8
    function countctfs(){
        $db=connectDB();
        $sql='SELECT count(*) as `total` FROM `ctfs`';
        $countctfs = $db->prepare($sql);
        $countctfs->execute();
        return $countctfs;
    }

    #9
    function getctfs(){
        $db=connectDB();
        $sql='SELECT * FROM `ctfs`';
        $getctfs = $db->prepare($sql);
        $getctfs->execute();
      
        return $getctfs;
    }

    #10
    function getInfoUser($username){
        $db=connectDB();
        $sql='SELECT `mail`,`userFirstName`,`userLastName`,`userScore`,`imgName` FROM `users` WHERE username= :usr';
        $getInfoUser = $db->prepare($sql);
        $getInfoUser->execute(array(':usr' =>$username));
        if($getInfoUser){
            return $getInfoUser;
        }

    }
    #11
    function insertarusuario($username,$mail,$password,$userFirstName,$userLastName,$hash){

        $db=connectDB();
        $consultaSQL = "INSERT INTO users(`username`, `mail`, `passHash`, `userFirstName`, `userLastName`, `creationDate`, `active`, `activationCode`) VALUES (:username,:mail,:passHash,:userFirstName,:userLastName,addtime(now(),3000),0,:activationCode)";
        $insertarusuario = $db->prepare($consultaSQL);
        $insertarusuario->execute(array(':username' =>$username,':mail' =>$mail,':passHash' =>$password,':userFirstName' =>$userFirstName,':userLastName' =>$userLastName,':activationCode' =>$hash));
                    
    }

    #conseguir la contra
    function selectuserpassword($username){
        $db=connectDB();
        $sql='SELECT passHash FROM `users` WHERE username= :rol';
        $password = $db->prepare($sql);
        $password->execute(array(':rol' =>$username));
        if($password){
            foreach($password as $pass){
                $pass = $pass['passHash'];
                return $pass;
            }
           
        }
       
    }

    #12
    function updatelastlogin($username){
        $db=connectDB();
        $sql='UPDATE `users` SET `lastLogin` = addtime(now(),0) WHERE `username` = :rol';
        $updatelastlogin = $db->prepare($sql);
        $updatelastlogin->execute(array(':rol' =>$username));
    }



    #13
    function lastctf(){
        $db=connectDB();
        $sql='SELECT * FROM `ctfs` ORDER BY `idctf` DESC LIMIT 1';
        $lastctf = $db->prepare($sql);
        $lastctf->execute();
        if($lastctf){
            foreach($lastctf as $ctf){
                $ctf = $ctf;
            }
            return $ctf;
        }
    }


    #14
    function getflagformid($idctf){
        $db=connectDB();
        $sql='SELECT flag FROM `ctfs` WHERE idctf= :rol';
        $flag = $db->prepare($sql);
        $flag->execute(array(':rol' =>$idctf));
        if($flag){
            foreach($flag as $fl){
                $fl = $fl['flag'];
            }
            return $fl;
        }
    }


    #15
    function getscoreformid($idctf){
        $db=connectDB();
        $sql='SELECT score FROM `ctfs` WHERE idctf= :rol';
        $score = $db->prepare($sql);
        $score->execute(array(':rol' =>$idctf));
        if($score){
            foreach($score as $sc){
                $sc = $sc['score'];
            }
            return $sc;
        }
    }


    #16
    function getscoreactualuser($iduser){
        $db=connectDB();
        $sql='SELECT userScore FROM `users` WHERE iduser= :rol';
        $score = $db->prepare($sql);
        $score->execute(array(':rol' =>$iduser));
        if($score){
            foreach($score as $sc){
                return $sc['userScore'];
            }
        }
    }


    #17
    function updatescoreuser($iduser,$score){
        $db=connectDB();
        $sql='UPDATE `users` SET `userScore` = :score WHERE `iduser` = :iduser';
        $updatescoreuser = $db->prepare($sql);
        $updatescoreuser->execute(array(':score' =>$score,':iduser' =>$iduser));
    }

    #18
    function updateAvatar($nomFinal,$iduser){
        $db=connectDB();
        $sql='UPDATE `users` SET `imgName` = :nomFinal WHERE `iduser` = :iduser';
        $updateUserAvatar = $db->prepare($sql);
        $updateUserAvatar->execute(array(':nomFinal' => $nomFinal,':iduser' =>$iduser));
    }


    #19
    function updatectfcompleted($iduser,$idctf){
        $db=connectDB();
        $sql='INSERT INTO `retoscompletados` (`idretos`, `iduser`) VALUES (:idctf,:iduser)';
        $updatectfcompleted = $db->prepare($sql);
        $updatectfcompleted->execute(array(':idctf' =>$idctf,':iduser' =>$iduser));
    }
    #20
    function getctfcompleted($iduser,$idctf){
        $db=connectDB();
        $sql='SELECT * FROM `retoscompletados` WHERE iduser= :iduser AND idretos= :idctf';
        $ctfcompleted = $db->prepare($sql);
        $ctfcompleted->execute(array(':iduser' =>$iduser,':idctf' =>$idctf));
        if($ctfcompleted){
            $completed= $ctfcompleted->rowcount()>0 ? true : false;
            return $completed;
        } 
    }

    #21
    function getranking(){
        $db=connectDB();
        $sql='SELECT * FROM `users` ORDER BY `userScore` DESC';
        $ranking = $db->prepare($sql);
        $ranking->execute();
        if($ranking){
            return $ranking;
        }
    }

    function getWinner(){
        $db=connectDB();
        $sql='SELECT * FROM `users` ORDER BY `userScore` DESC LIMIT 1';
        $ranking = $db->prepare($sql);
        $ranking->execute();
        if($ranking){
            return $ranking;
        }
    }

    #22
    function getretosuser($iduser){
        $db=connectDB();
        $sql='SELECT * FROM `ctfs` WHERE iduser= :iduser';
        $retosuser = $db->prepare($sql);
        $retosuser->execute(array(':iduser' =>$iduser));
        if($retosuser){
            return $retosuser;
        }
    }

    #23
    function getiduser($username){
        $db=connectDB();
        $sql='SELECT iduser FROM `users` WHERE username= :username';
        $iduser = $db->prepare($sql);
        $iduser->execute(array(':username' =>$username));
        if($iduser){
            foreach($iduser as $id){
                $id = $id['iduser'];
            }
            return $id;
        }
    }

?>
