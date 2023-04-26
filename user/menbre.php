<?php 
session_start();
require('link.php');
require_once('../dbconnection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/sk.jpg" type="images/jpg"/>
  <title>Sweet by kjohn's||Menbre</title>
</head>
<body>
    <?php include("include/header.php")?>
    
        <div class=" col-12  py-1">
        <a href="../index.php">
            <img src="../images/log.png" class="rounded mx-auto d-block  logo" alt="logo">
        </a>    
        </div>
        <?php 
        
        $nom = $_SESSION['login']['nom'];

        var_dump($_SESSION['login']);
        var_dump($_SESSION['login']['adresse']);
            
        ?>
        <div class='text-center p-3 '>
            <p style="font-family: 'Dayrom'; font-size:30px;"> bienvenu <?php echo $nom;?></p>
         </div>
         <?php
        
         ?>
   <?php
   
        include_once('include/footer.php');
    ?>
</body>
</html>