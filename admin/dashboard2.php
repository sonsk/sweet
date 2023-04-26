<?php
session_start();
include('../dbconnection.php');
require('link.php');
if(!isset($_SESSION['alogin'])){
    header("location:login.php");
}
  else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-25">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/sweet.png" type=""/>
    <title>Admin</title>
</head>

<body>
    <?php include('include/header.php');?>
    <div class="row pt-5 mx-auto">
        <div class="col-md-4">
                <img src="../images/dashboard.png" width="400" height="455">
            </div>
        <div class="container pt-2 col-md-8" style="background-color: rgb(247 186 219);" >
        <h5><b>Dashboard</h5>
            <div class = "container pt-5 " style="background-color:azure;">
                <div class="row ">

                    <div class="col-xl col-md-6 card border-light mb-3" style="max-width: 18rem;">
                                <?php
                                    $req='SELECT count(*) FROM user';
                                    $query=$bdd->prepare($req);
                                    $query->execute();
                                    $results=$query->fetchColumn();

                                    $count_user=$results;
                                
                                ?>
                            
                            <div class="card-body">
                                <h5 class="card-title">Infos Utilisateurs</h5> <span><?php echo ( $count_user);?></span>
                                <p class="card-text"><a href="infos_user.php">Gérer les Utilisateurs</a></p>
                            </div>
                    </div>
                    <div class="col-xl col-md-6 card border-light mb-3" style="max-width: 18rem;">
                                <?php
                                    $req='SELECT count(*) FROM tblcake';
                                    $query=$bdd->prepare($req);
                                    $query->execute();
                                    $results=$query->fetchColumn();

                                    $count_cake=$results;
                                
                                ?>
                        
                            <div class="card-body">
                                <h5 class="card-title">Total Cake</h5> <span><?php echo ($count_cake);?></span>
                                <p class="card-text"><a href="manage-cake.php">Gérer les commandes de gâteau</a></p>
                            </div>
                    </div>
                    <div class="col-xl col-md-6  card border-light mb-3" style="max-width: 18rem;">
                                <?php
                                    $req='SELECT count(*) FROM tblcup';
                                    $query=$bdd->prepare($req);
                                    $query->execute();
                                    $results=$query->fetchColumn();

                                    $count_cup=$results;
                                
                                ?>
                        
                            <div class="card-body">
                                <h5 class="card-title">Total Cup-Cake</h5><span><?php echo ($count_cup );?></span>
                                <p class="card-text"><a href="manage-cupcake.php">Gérer les commandes de Cup-Cake</a></p>
                            </div>
                    </div>
                    <div class="col-xl col-md-6  card border-light mb-3" style="max-width: 18rem;">
                    <?php
                                    $req='SELECT count(*) FROM realisations';
                                    $query=$bdd->prepare($req);
                                    $query->execute();
                                    $results=$query->fetchColumn();

                                    $count_tof=$results;
                                
                                ?>
                        
                            <div class="card-body">
                                <h5 class="card-title">Total photos</h5><span><?php echo ($count_tof );?></span>
                                <p class="card-text"><a href="manage-photo.php">Gérer les photos</a></p>
                            </div>
                    </div>

                </div>   
                <button class="btn btn-primary " >
            <a href="ajout_realisations.php" style="color: white; text-decoration:none; cursor:pointer;">Ajoutez des photos au catalogue<span><i class="fas fa-plus faw float-right"></i></span></a>
        </button>   
        <button class="btn btn-success " >
            <a href="ajout_parfum.php" style="color: white; text-decoration:none; cursor:pointer;">Ajoutez des parfums</a>
        </button> 
        <button class="btn btn-warning " >
            <a href="ajout_taille.php" style="color: white; text-decoration:none; cursor:pointer;">Ajoutez des tailles</a>
        </button>
        <button class="btn btn-danger " >
            <a href="ajout_produit.php" style="color: white; text-decoration:none; cursor:pointer;">Ajoutez des produits à la boutique</a>
        </button>
            </div>
        sweet by kjohn's
        </div>
    </div> 
</body>
</html>
 <?php } ?>