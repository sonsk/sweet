<?php
    session_start();
    require('link.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/sk.jpg" type="images/jpg"/>
    <title>Inscription</title>
</head>
<body>
<div class="pb-2" style="position: fixed; width: 100%; z-index:999;">
    <?php include ('include/header.php'); ?>
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

<div class="container col-md-6 pt-3"  >
    <h5 class='text-center'>Inscription</h5>
        <form class="box" method="POST" action="registration.php" >
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nom" placeholder="Votre nom" required="true">
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-lg" name="email" placeholder="Votre email">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control form-control-lg" name="tel" placeholder="Téléphone valide" required="true">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="adresse" placeholder="Adresse de livraison" required="true">
            </div>
            <div class="form-group">    
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe" required="true">
            </div>
            <div class="form-group">    
                <input type="password" class="form-control form-control-lg" name="confirm_password" placeholder="Confirmer le passe" required="true">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control form-control-lg" name="reg" value="S'enregistrer">
            </div>

        </form>
                <p>
                    vous avez un compte chez nous?<br>
                    <a href="login.php">Connectez vous</a>
                </p>
</div>
               
</div>
        <?php
       include('include/footer.php')
        ?>
</body>
</html>