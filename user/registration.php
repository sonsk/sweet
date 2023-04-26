<?php
session_start();
    require('../dbconnection.php');
    
    $nom=htmlentities($_POST['nom']);
    $tel=htmlentities($_POST['tel']);
    $adresse=htmlentities($_POST['adresse']);
    $email=htmlentities($_POST['email']);
    $password=md5($_POST['password']);
    $confirm_password=md5($_POST['confirm_password']);
    
      
    $sql= "INSERT INTO user (nom,tel,adresse,email,password,confirm_password,date_creation) VALUES (:nom,:tel,:adresse,:email,:password,:confirm_password,NOW())";
    
    $datauser=array(
        'nom'=>$nom,
        'tel'=>$tel,
        'adresse'=>$adresse,
        'email'=>$email,
        'password'=>$password,
        'confirm_password'=>$confirm_password);

    $query=$bdd->prepare($sql);
    $result=$query->execute($datauser);
    

    if (isset($result)) {
        $_SESSION['login']=array(
            'nom' => $nom,
            'adresse' => $adresse
            
        );
        echo "<script>alert('utilisateur crée');</script>";
        echo "<script type= 'text/javascript'>document.location = 'index.php';</script>";
       }
 
?>