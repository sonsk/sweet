<?php
session_start();
unset($_SESSION['alogin']);
require('link.php');
require('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/sweet.png" type="images/jpg"/>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>boutique</title>
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
    <div class="" style="padding-top:80px;">
    <h1 class="text-center" style="font-family: 'christwish';">COMING SOON ;-)</h1>
    <img src="images/coming.png" alt="Image1" class="img-fluid">
    </div>
</body>
</html>
