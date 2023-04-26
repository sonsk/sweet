<?php
   require('../dbconnection.php');
    
 
if(isset($_POST['log'])){
    $nom=htmlentities($_POST['nom']);
    /* $tel=htmlentities($_POST['tel']); */
    $password=md5($_POST['password']);
    $req=" select * from user where nom='$nom' && password='$password'";
    
    $query=$bdd->prepare($req);
    $query->execute();
    $results= $query->fetchAll();
    foreach ($results as $value) {
        
        if ($query->rowCount() > 0) {
        
            $_SESSION['login']=array(
                'nom' => $nom,
                'adresse' => $value['adresse']
                
            );
         header("location:index.php");
        
        }
       
        else {
            header("location:register.php");
        }
    }
                                                
   
}
?>
