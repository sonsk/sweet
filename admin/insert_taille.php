<?php 
require('link.php');
 require('../dbconnection.php');
$photo="";
$valid="";
if(isset($_POST["ajoutTaille"])){
    //echo"ok";

    $taille=$_POST["taille"];
    $portion=$_POST["portion"];
    $prix =$_POST["prix"];
   

    $sql = "INSERT INTO taille(taille,portion,prix) values (:taille,:portion,:prix)";
    
    $datauser=array(
        'taille'=>$taille,
        'portion'=>$portion,
        'prix'=>$prix);

    $query=$bdd->prepare($sql);
    $result=$query->execute($datauser);
   /*  var_dump($result); */
    
    if(isset($result)){
        $valid = "<div class='alert alert-success'>
                <a href='#' class='close' 
                data-dismiss='alert'
                aria-label='close'>&times;</a><b>Image ajoutée avec success</b> 
                <a href='dashboard.php'>retourner au dashboard</a>     
        </div>";
    }else{
        $valid = "<div class='alert alert-danger'>
        <a href='#' class='close' 
        data-dismiss='alert'
        aria-label='close'>&times;</a><b>L'image n'a pas éyé ajoutée</b>      
        </div>";
    }
   
    
}

?>