<?php
session_start();
require('link.php');

require('../dbconnection.php');

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/sk.jpg" type="images/jpg"/>
    <title>Sweet by kjohn's||Cup-Cake</title>
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

<div class=" col-md-12 alert alert-danger text-center" role="alert">
   <b> vous devrez payer la moitié de votre commande une fois celle ci validée</b>
</div>


<div class="container pt-3"  >
        <form class="box" method="POST" action="cc.php" >
        
              
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nom" placeholder="Votre nom" required>
                
            </div>
            
            <div class="form-group">
                <input type="tel" class="form-control form-control-lg" name="tel" pattern="[0-9]{9}" placeholder="Téléphone valide" required>
                
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="adresse" placeholder="Adresse de livraison" required>
                
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="glacage" placeholder="chocolat vanille fraise..." required>
                
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-lg" name="date_livraison" placeholder="Date de livraison" required>
                
            </div>
            <div class="form-group">
                <input type="number" class="form-control form-control-lg" name="nombre" placeholder="nombre de cup- cake" required>
                
            </div>
           
            <div class="form-group">
                <input type="submit" id="liveAlertBtn" class="form-control form-control-lg" name="" value="commander">
            </div>

        </form>
</div>
<?php
        include('include/footer.php')
?>
<script scr="alert.js"> </script>

</body>
</html>