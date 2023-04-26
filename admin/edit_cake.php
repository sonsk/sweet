<?php

require('link.php');

require('../dbconnection.php');
    
// declaration des variables en route pour mon crud 

    if(isset($_POST['commander'])){
   
    $nom=htmlentities($_POST['nom']);
    $tel=htmlentities($_POST['tel']);
    $adresse=htmlentities($_POST['adresse']);
    $forme=htmlentities($_POST['forme']);
    $glacage=htmlentities($_POST['glacage']);
    $date_livraison=htmlentities($_POST['date_livraison']);
    $taille=htmlentities($_POST['taille']);
    $edit=$_GET['id'];

// mis à jour des informations du formulaire  récupéré par le $_GET['id']=$edit
    $req="UPDATE tblcake SET nom=:nom , tel=:tel , adresse=:adresse ,forme=:forme ,glacage=:glacage ,date_livraison=:date_livraison ,taille=:taille , date_creation=NOW() WHERE id=:edit";
    $query=$bdd->prepare($req);
    

    $query->bindParam(':nom',$nom,PDO::PARAM_STR);
    $query->bindParam(':tel',$tel,PDO::PARAM_STR);
    $query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
    $query->bindParam(':forme',$forme,PDO::PARAM_STR);
    $query->bindParam(':glacage',$glacage,PDO::PARAM_STR);
    $query->bindParam(':date_livraison',$date_livraison,PDO::PARAM_STR);
    $query->bindParam(':taille',$taille,PDO::PARAM_STR);
    $query->bindParam(':edit',$edit,PDO::PARAM_STR);
    
    $resultat=$query->execute();

   if(isset($resultat)){
    echo "<script>alert('commande modifiée');</script>";
    echo "<script type= 'text/javascript'>document.location = 'manage-cake.php';</script>";

   }
}  
?>


<?php
// suppresion d'une entité

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql= "DELETE FROM tblcake WHERE id=".$id;
    $query=$bdd->prepare($sql);
    $result=$query->execute();

    if($result){
        echo "<script>alert('cool');</script>";
        echo "<script type= 'text/javascript'>document.location = 'manage-cake.php';</script>";

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

  <div id="liveAlertPlaceholder"></div>
<div class="container pt-3"  >
<nav  aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Cake</li>
            </ol>
        </nav>
                         <!-- code php pour preparation de la requete qui modifiera le formulaire pour un id fourni -->
                        <?php
                            $edit=$_GET['id']; //lorsque la barre d'adresse aura un GET id il recuperera les infos pour l'entite correspondant
                             $req="SELECT * FROM tblcake WHERE id=$edit ";
                             $query=$bdd->prepare($req);
                             $query->execute();
                             $results = $query->fetchAll(\PDO::FETCH_ASSOC);
                             foreach ($results  as $result){
                             
                         ?>

                         <!-- formulaire qui récupère les informations qui vont ê^tre modifie par le biais du GET id -->
<form class="box needs-validation" action="" novalidate method="POST">
                           

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="nom" placeholder="Votre nom" required value="<?php echo $result['nom'];?>">
                <div class="invalid-feedback">Veuillez remplir correctement ce champ!</div>
            </div>
            
            <div class="form-group">
                <input type="tel" class="form-control form-control-lg" name="tel" pattern="[0-9]{9}" placeholder="Téléphone valide" required value="<?php echo $result['tel'];?>">
                
                <div class="invalid-feedback">Veuillez entrer un numéro valide!</div>
                
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="adresse" placeholder="Adresse de livraison" required value="<?php echo $result['adresse'];?>">
                <div class="invalid-feedback">Veuillez remplir correctement ce champ!</div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="forme" placeholder="carré, rond..." required value="<?php echo $result['forme'];?>">
                <div class="invalid-feedback">Veuillez remplir correctement ce champ!</div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="glacage" placeholder="chocolat, vanille, fraise..." required value="<?php echo $result['glacage'];?>">
                <div class="invalid-feedback">Veuillez remplir correctement ce champ!</div>
            </div>
            <div class="form-group">
                <input type="date" class="form-control form-control-lg" name="date_livraison" placeholder="Date de livraison" required value="<?php echo $result['date_livraison'];?>">
                <div class="invalid-feedback">Veuillez remplir correctement ce champ!</div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="taille" placeholder="petite, moyenne, grande" required value="<?php echo $result['taille'];?>">
                <div class="invalid-feedback">Veuillez remplir correctement ce champ!</div>
            </div>
            
           
            <div class="form-group">
                <input type="submit"  class="form-control form-control-lg" name="commander" id="commander" value="valider modification">
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