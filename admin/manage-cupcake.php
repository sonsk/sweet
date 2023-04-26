<?php
session_start();
require('link.php');

require('../dbconnection.php');
if(!isset($_SESSION['alogin'])){
    header("location:login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/sweet.png" type=""/>
    <title>Manage CupCake</title>
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
    <div class="container pt-2 "  >
        <h5><b>Dashboard CupCake</h5>
        <nav  aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage CupCake</li>
            </ol>
        </nav>
            <div class = "container pt-5 " style="background-color:azure;">
               <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                
                                <th scope="col">Glacage</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Date de livraison</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Client</th>
                                <th scope="col">Jour de commande</th>
                                <th scope="col">Action</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $req='SELECT * FROM tblcup';
                                $query=$bdd->prepare($req);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);

                                $count_cup=1;
                                $_SESSION['count_cup']=1;
                                if($query->rowCount()>0){
                                foreach($results as $result){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $count_cup++ ?></tth>
                              
                                <td><?php echo $result->glacage ?></td>
                                <td><?php echo $result->nombre ?></td>
                                <td><?php echo date('d/m/Y', strtotime($result->date_livraison))?></td>
                                <td><?php echo $result->tel ?></td>
                                <td><?php echo $result->adresse ?></td>
                                <td><?php echo $result->nom ?></td>
                                <td><?php echo date('d/m/Y', strtotime($result->date_creation)) ?></td>
                                <td>
                                <div class="">
                                    <a href="edit_cup.php?id=<?php echo  $result->id?>" ><i class="fa fa-pen-to-square"></i></a>
                                    <!-- <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a> -->
                                    <a href="edit_cup.php?delete=<?php echo $result->id?>" ><i class="fa fa-trash"></i></a>
                                    
                                </div>
                                </td>
                            </tr>
                            <?php }} 
                            $_SESSION['count_cup']=$count_cup-1;
                            ?>
                            
                        </tbody>
                    </table>

               </div>
                  
            </div>
       sweet by kjohn's
    </div>
     
</body>
</html>