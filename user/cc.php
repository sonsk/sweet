<?php
    require('../dbconnection.php');

    $nom=$_POST['nom'];
    $tel=$_POST['tel'];
    $adresse=$_POST['adresse'];
    $glacage=$_POST['glacage'];
    $date_livraison=$_POST['date_livraison'];
    $nombre=$_POST['nombre'];

    $sql="INSERT INTO tblcup (nom,tel,adresse,glacage,date_livraison,nombre,date_creation)VALUES(:nom,:tel,:adresse,:glacage,:date_livraison,:nombre,NOW())";

    $datauser=array(
        'nom'=>$nom,
        'tel'=>$tel,
        'adresse'=>$adresse,
        'glacage'=>$glacage,
        'date_livraison'=>$date_livraison,
        'nombre'=>$nombre

    );
    $query=$bdd->prepare($sql);
    $result=$query->execute($datauser);
    
    if(isset($result)){
        echo "<script>alert('commande passée avec succès');</script>";
        echo "<script type= 'text/javascript'>document.location = 'commande_cup.php';</script>";
    }

?>