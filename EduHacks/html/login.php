
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    
    <body>
      <br></br>
      <br></br>
      <br></br>
      <a href="../index.php" class="home">
            <h1 class="title" data-text="Edu Hacks"><span>Edu Hacks</span></h1>
      </a>
      <div class="login-box">

      <?php 
        if(isset($_GET["redirect"])){
          echo '<div class="alert alert-primary" role="alert">';
          echo "Per accedir-hi has d'iniciar sessió";    
          echo '</div>';

        }
      ?>
      
        <h2>Inicia sessió</h2>  
        <form method="POST">
          <div class="user-box">
            <input type="text" name="nomUsuari" required="">
            <label>Usuari</label>
          </div>
          <div class="user-box">
            <input type="password" name="passUsuari" required="">
            <label>Contrasenya</label>
          </div>
         <input class="accedeix " type="submit" name="submit" value="ACCEDEIX">
        <br><br><br>
    
        <p class="registre">Encara no t'has registrat?</p>
        <a class="boton" href="./register.html">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Registre
        </a>
        </form><br>
      <a class="registre" href="./introduirMail.html">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Has ovlidat la contrasenya?
      </a>

      </div>

    <?php

      if($_SERVER["REQUEST_METHOD"] == "POST"){
  
        $nomUsuari = $_POST["nomUsuari"];
        $passUsuari = $_POST["passUsuari"];
        echo $passUsuari;
        if(isset($nomUsuari) && isset($passUsuari)){
          include("../php/connectDB.php");
          $userhash=selectuserpassword($nomUsuari);
          if($userhash){
            if(password_verify($passUsuari,$userhash)){
              updatelastlogin($nomUsuari);
              session_start();
              $_SESSION["nomUsuari"] = $nomUsuari;
              $_SESSION['passUsuari'] = $passUsuari;
              header("Location: ./home.php");
              exit();
            } 
        }else{
          //echo "<p class='error'>Usuari o contrasenya incorrectes</p>";
        }
      }
    }

    ?>


