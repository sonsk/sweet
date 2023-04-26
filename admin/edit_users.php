<?php

require('link.php');

require_once('../dbconnection.php');
    


    if(isset($_POST['enregistrer'])){
   
    $nom=htmlentities($_POST['nom']);
    $prenom=htmlentities($_POST['prenom']);
    $tel=htmlentities($_POST['tel']);
    $adresse=htmlentities($_POST['adresse']);
    $email=htmlentities($_POST['email']);
    $password=md5($_POST['password']);
    $confirm_password=md5($_POST['confirm_password']);
    
    $edit=$_GET['id'];

// mis à jour des informations du formulaire  récupéré par le $_GET['id']=$edit
    $req="UPDATE user SET nom=:nom ,prenom=:prenom, tel=:tel , adresse=:adresse ,email=:email,password=:password,confirm_password=:confirm_password,date_creation=:NOW()  WHERE id=:edit";
    $query=$bdd->prepare($req);
    

    $query->bindParam(':nom',$nom,PDO::PARAM_STR);
    $query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
    $query->bindParam(':tel',$tel,PDO::PARAM_STR);
    $query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':confirm_password',$confirm_password,PDO::PARAM_STR);
    $query->bindParam(':edit',$edit,PDO::PARAM_STR);
    
    $resultat=$query->execute();

   if(isset($resultat)){
    echo "<script>alert('commande modifiée');</script>";
    echo "<script type= 'text/javascript'>document.location = 'infos_login.php';</script>";

   }
}  
?>


<?php
// suppresion d'une entité

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql= "DELETE FROM user WHERE id=".$id;
    $query=$bdd->prepare($sql);
    $result=$query->execute();

    if ($result) {
        echo "<script>alert('cool');</script>";
        echo "<script type= 'text/javascript'>document.location = 'infos_login.php';</script>";

    }
}

?>

<body>

<div class="pb-2" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>

<div class=" col-12 " style="padding-top:100px;">
        <a href="index.php">
         <img src="../images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
        </a>
    </div>
<div class="container pt-3"  >
<nav  aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit user</li>
            </ol>
        </nav>
                         <!-- code php pour preparation de la requete qui modifiera le formulaire pour un id fourni -->
                        <?php
                            $edit=$_GET['id'];
                             $req="SELECT * FROM user WHERE id=$edit ";
                             $query=$bdd->prepare($req);
                             $query->execute();
                             $results = $query->fetchAll(\PDO::FETCH_ASSOC);
                             foreach ($results as $result) {
                             
                         ?>

                         <!-- formulaire qui récupère les informations qui vont ê^tre modifie par le biais du GET id -->
<form class="box needs-validation" action="" novalidate method="POST">
                           

<div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nom" placeholder="Votre nom" required="true" value="<?php echo $result['nom'];?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="prenom" placeholder="Votre prenom" required="true" value="<?php echo $result['prenom'];?>">
            </div>
            
            <div class="form-group">
                <input type="tel" class="form-control form-control-lg" name="tel" placeholder="Téléphone valide" required="true"value="<?php echo $result['tel'];?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="adresse" placeholder="Adresse de livraison" required="true"value="<?php echo $result['adresse'];?>">
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-lg" name="email" placeholder="Votre email"value="<?php echo $result['email'];?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Votre email"value="<?php echo $result['password'];?>">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="confirm_password" placeholder="Votre email"value="<?php echo $result['confirm_password'];?>">
            </div>

            <div class="form-group">
                <input type="submit"  class="form-control form-control-lg" name="enregistrer" id="enregistrer" value="valider modification">
            </div>
            

        </form>
</div>
<?php
        include('../include/footer.php')
?>


<script scr="alert.js"> </script>
</body>

</html>
<?php } ?>