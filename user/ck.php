<?php
    require('../dbconnection.php');

    $nom=$_POST['nom'];
    $tel=$_POST['tel'];
    $adresse=$_POST['adresse'];
    $forme=$_POST['forme'];
    $glacage=$_POST['glacage'];
    $date_livraison=$_POST['date_livraison'];
    $taille=$_POST['taille'];

    $sql="INSERT INTO tblcake (nom,tel,adresse,forme,glacage,date_livraison,taille,date_creation)VALUES(:nom,:tel,:adresse,:forme,:glacage,:date_livraison,:taille,NOW())";

    $datauser=array(
        'nom'=>$nom,
        'tel'=>$tel,
        'adresse'=>$adresse,
        'forme'=>$forme,
        'glacage'=>$glacage,
        'date_livraison'=>$date_livraison,
        'taille'=>$taille

    );
    $query=$bdd->prepare($sql);
    $result=$query->execute($datauser);

    if(isset($result)){
        echo "<script>alert('commande passée avec succès');</script>";
        echo "<script type= 'text/javascript'>document.location = 'commande_cake.php';</script>";
      }

?>