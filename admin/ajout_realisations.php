<?php
session_start();
require('link.php');

require('../dbconnection.php');
require('upload_img.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="images/sk.jpg" type="images/jpg"/>
    <title>Mescakes</title>
</head>
<body>
<div class="pb-2" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>
    <div class=" col-12 " style="padding-top:100px;">
        <a href="index.php">
         <img src="../images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
        </a>
    </div>
<nav  aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">ajout photos</li>
            </ol>
        </nav>
<h5 class="text-center"> AJOUTE TA DERNIERE REALISATION</h5>
<form class="box "  method="POST" action="#" enctype="multipart/form-data"  >

            <div class="row">
                <div class="col-md-12">
                    <?php echo $valid ?>
                </div>
            </div>
            <div class="form-group row">
               <input type="text" class="form-control form-control-lg" name="nom" placeholder="Nom" required>
                
            </div>
            <div class="form-group row">
               <input type="text" class="form-control form-control-lg" name="description" placeholder="description" required>
                
            </div>
            
            <div class="form-group row">
            <input type="file" name="img" class="form-control-file ">
            </div>

            <div class="form-group">
                <input type="submit" value="Ajouter" name="ajoutImg">
            </div>
</form>
</body>
</html>