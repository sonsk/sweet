<?php
session_start();
require('link.php');

require('../dbconnection.php');
if (isset($_POST['adlog'])) {
  $AdminName=$_POST['name'];
  $AdminPass=$_POST['password'];
  $sql="SELECT * FROM admin WHERE AdminName=:AdminName and AdminPass=:AdminPass";
  $query=$bdd->prepare($sql);
  $query->bindParam(':AdminName',$AdminName,PDO::PARAM_STR);
  $query->bindParam(':AdminPass',$AdminPass,PDO::PARAM_STR);
  $query->execute();
  $results= $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount()>0) {
        $_SESSION['alogin']=$AdminName;
       
         echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../images/sweet.png" type="images/png"/>
    <title>Admin||login</title>
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
    <div class="row">
        <div class="col-md-4">
            <img src="../images/privacy.png" width="400" height="455">
        </div>
        <div class="container col-md-6" >
            <form class="box" method="POST">
            
                
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="name"  placeholder="utilisateur" required="true">
                </div>
                
                <div class="form-group">    
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Mot de passe">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="form-control form-control-lg" name="adlog" value="Se connecter">
                </div>

            </form>
            <div>
                <p>
                se connecter en tant que administrateur?<br>
                    
                </p>
            </div>

        </div>
    </div>
    <?php
       include('include/footer.php')
    ?>
</body>
</html>


 