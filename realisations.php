<?php
session_start();
include_once('link.php');
require('dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/sweet.png" type="images/jpg"/>
    <title>NosRealisations</title>
</head>
<body>
<div class="pb-2" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>
    <div class=" col-12 " style="padding-top:100px;">
        <a href="index.php">
         <img src="images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
        </a>
    </div>
<div class="container row text-center  pb-5" style="padding-top:80px;">

    <?php

        $photos=$bdd->query('SELECT * FROM realisations ORDER BY id ');
        while ($donnee=$photos->fetch()) {
            $donnee['photo'] = substr($donnee['photo'], 3);
    ?>
    <?php echo' <div class="col-md-3  row pt-5">
                            
                    <div class=" card mx-auto" style="width: 22rem;">'
    ?>
        <?php echo "<img src='$donnee[photo]'>" ?>
                                            
         <?php echo '</div>
                    </div>'
            ?>

    <?php
        }
    ?>
    
    </div>
    <?php
        include('include/footer.php')
    ?>
</body>
</html>
