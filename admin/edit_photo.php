<?php

require_once ('../dbconnection.php');

// suppresion d'une entité

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql= "DELETE FROM realisations WHERE id=".$id;
    $query=$bdd->prepare($sql);
    $result=$query->execute();

    if ($result) {
        echo "<script>alert('cool');</script>";
        echo "<script type= 'text/javascript'>document.location = 'manage-photo.php';</script>";

    }
}

