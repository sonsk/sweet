<?php 
require('link.php');
 require('../dbconnection.php');
$photo="";
$valid="";
if(isset($_POST["ajoutParfum"])){
    //echo"ok";

    $nom=$_POST["nom"];
    $description=$_POST["description"];
    $photo = $_FILES['img']['name'];
    $upload = "../parfums/".$photo;

    $formats=array('png','jpg','gif');
    $format=substr($_FILES['img']['name'],-3);

    /* var_dump($upload);
    var_dump($format); */
    if(in_array($format,$formats)){
       $store= move_uploaded_file($_FILES['img']['tmp_name'],$upload);
    }

    /* var_dump($store); */

    $sql = "INSERT INTO parfum(nom_parfum,desc_parfum,photo_parfum) values (:nom_parfum,:desc_parfum,:photo_parfum)";
    
    $datauser=array(
        'nom_parfum'=>$nom,
        'desc_parfum'=>$description,
        'photo_parfum'=>$upload);

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