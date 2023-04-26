<?php 
require('link.php');
 require('../dbconnection.php');
$photo="";
$valid="";
if(isset($_POST["ajoutProduit"])){
    //echo"ok";

    $nom=$_POST["nom"];
    $category=$_POST["category"];
    $prix=$_POST["prix"];
    $description=$_POST["description"];
    $photo = $_FILES['img']['name'];
    $upload = "../produits/".$photo;

    $formats=array('png','jpg','gif');
    $format=substr($_FILES['img']['name'],-3);

    /* var_dump($upload);
    var_dump($format); */
    if(in_array($format,$formats)){
       $store= move_uploaded_file($_FILES['img']['tmp_name'],$upload);
    }

    /* var_dump($store); */

    $sql = "INSERT INTO producttb(product_name,category,product_price,description,product_image,created_at) values (:product_name,:category,:product_price,:description,:product_image,NOW())";
    
    $datauser=array(
        'product_name'=>$nom,
        'category'=>$category,
        'product_price'=>$prix,
        'description'=>$description,
        'product_image'=>$upload);

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