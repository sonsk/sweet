<?php
session_start();
require('link.php');
require('validation.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/sk.jpg" type="images/jpg"/>
    <title>Connection</title>
</head>
<body>
<div class="pb-2" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>
    <div class=" col-12 " style="padding-top:100px;">
        <a href="../index.php">
         <img src="../images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
        </a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="../images/privacy.png" width="400" height="455">
        </div>

        <div class="container col-md-6" >
            <h5 class="text-center">Connexion</h5>
            <form class="box" method="POST" action="">
            
            <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nom"  placeholder="Nom d'utilisateur" required="true">
                </div>
            <!--  <div class="form-group">
                    <input type="tel" class="form-control form-control-lg" name="tel" pattern="[0-9]{9}" placeholder="Téléphone à l'inscription" required="true">
                </div> -->
                
                <div class="form-group">    
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="form-control form-control-lg" name="log" value="Se connecter">
                </div>

            </form>
            <div>
                <p>
                    vous n'avez pas encore de compte chez nous?<br>
                    <a href="register.php">Enregistrez vous</a>
                </p>
            </div>

        </div>
    </div>
    <?php
        include_once('include/footer.php');
    ?>
</body>
</html>


 