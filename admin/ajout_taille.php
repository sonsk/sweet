<?php
session_start();
require('link.php');

require('../dbconnection.php');
require('insert_taille.php');
if (isset($_POST['deleteTaille'])) {
    var_dump($_POST['id']);
    $id=$_POST['id'];
    foreach ($id as $id) {
        $del = "DELETE FROM taille where id=".$id;
        $query = $bdd->prepare($del);
        $query->execute();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="images/sk.jpg" type="images/jpg"/>
    <title>Tailles</title>
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
<h5 class="text-center"> AJOUTE DES TAILLES</h5>
<div class="row">
<div class="col-md-6">
<form class="box "  method="POST" action=""   >

            <div class="row">
               
            </div>
            <div class="form-group row">
               <input type="text" class="form-control form-control-lg" name="taille" placeholder="S,M,..." required>
                
            </div>
            <div class="form-group row">
               <input type="number" class="form-control form-control-lg" name="portion" placeholder="nombre de portion" >
                
            </div>
            
            <div class="form-group row">
            <input type="number" name="prix" class="form-control-lg " placeholder="prix">
            </div>

            <div class="form-group">
                <input type="submit" value="Ajouter" name="ajoutTaille">
            </div>
</form>
</div>
<div class="row col-md-6">
    
        <?php 
       
       

        $photos=$bdd->query('SELECT * FROM taille ORDER BY id ');
        while($donnee=$photos->fetch())
        {
 
    ?>
    
         <?php echo ' <div class=" col-md-3  row pt-5">
                            
                    <div class=" mx-auto" >';
                  echo " <form method='post'>
                  <input type='hidden' name='id[]' value='$donnee[id]'>
                    <button type='submit' class='btn btn-danger' value='' name='deleteTaille'>X</button>
                   .</form> ";
           
         echo "<p>Taille $donnee[taille]</p>";
         echo "<p>$donnee[portion] Portions</p>";
         echo "<p>Prix: $donnee[prix] FCFA</p>";

         echo '</div>
                    </div>';
            ?>

    <?php 
        }      
    ?>
    </div>
</div>
</body>
</html>