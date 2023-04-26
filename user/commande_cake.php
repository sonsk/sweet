<?php
session_start();
include_once('link.php');

require('../dbconnection.php');

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    
    <link rel="shortcut icon" href="../images/sk.jpg" type="images/jpg"/>
    <title>Sweet by kjohn's||Cake</title>
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
<div class=" col-md-12 alert alert-warning text-center" role="alert">
    
<b>

   <ul class="text-center">
   
    <li>petite taille(4portions) 8000FCfa</li><br>
    <li>taille moyenne(8portions) 12000FCfa</li><br>
    <li>grande taille(12portions) 18000FCfa</li><br>
    
   </ul>
   
</b>

</div>
    
  
<div class="container pt-3"  >
<form class="box " method="POST" action="ck.php" >
            
            
      
            <div class="form-group ">
                
                <input type="text" class="form-control form-control-lg"  name="nom" placeholder="Votre nom" required>
                
            </div>

            <div class="form-group">
                <input type="tel" class="form-control form-control-lg" name="tel" pattern="[0-9]{9}" placeholder="Téléphone valide" required>
           
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="adresse" placeholder="Adresse de livraison" required>
                
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="forme" placeholder="carré, rond..." required>
                
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="glacage" placeholder="chocolat, vanille, fraise..." required>
                
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-lg" name="date_livraison" placeholder="Date livraison" required>
                
            </div>
    
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="taille" placeholder="petite, moyenne, grande" required>
                
            </div>
           
            <div class="form-group">
                <input type="submit" id="liveAlertBtn" class="form-control form-control-lg" name="commander" value="commander">
            </div>

        </form>
</div>
<?php
        include('include/footer.php')
?>


<script scr="alert.js"> </script>

</body>

</html>