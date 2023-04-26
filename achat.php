<?php
session_start();
unset($_SESSION['alogin']);
require('link.php');
require('dbconnection.php');
if (isset($_POST['achat']) && isset($_POST['produit'])) {
    $prod = $_POST['produit'];
    header('location:achat.php?produit=' . $prod);
}
$parfum = "";
$prix = "";
if (isset($_POST['add']) && isset($_POST['parfum']) && isset($_POST['taille'])){
    if (isset($_POST['parfum'])) {
        foreach ($_POST['parfum'] as $value) {
            $parfum = $value;
        }
        foreach ($_POST['taille'] as $key) {
            $prix = $key;
        }
    }
    echo '<script type="text/javascript"> swal("WOW!","Message!","warning")</script>';
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo '<script type="text/javascript"> swal("WOW!","Message!","warning")</script>';
           
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'parfum' => $parfum,
                'prix' => $prix
            );

            $_SESSION['cart'][$count] = $item_array;
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("WOW!","Message!","success");';
            echo '}, 1000);</script>';
        }

    }else{

        $item_array = array(
            'product_id' => $_POST['product_id'],
            'parfum' => $parfum,
            'prix' => $prix
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        echo "<script> swal('Good job!', 'Article ajouté!', 'success')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-25">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
   <link rel="shortcut icon" href="images/sweet.png" type="images/jpg"/>
   
    <title>Achat</title>
</head>

<body>
    <style>
[type=radio] + img {
    cursor: pointer;
  }
  
  /* CHECKED STYLES */
  [type=radio]:checked + img {
    outline: 2px solid #EE6A8C;
  }
  [type=radio]{
    cursor: pointer;
  }
  
  /* CHECKED STYLES */
  [type=radio]:checked + div {
    outline: 2px solid #EE6A8C;
  }
  .fa-star,.fa-star-half{
    color: #EE6A8C;
    padding: 3% 0;
}


    </style>
    <div class="" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>
    <div class=" col-12 " style="padding-top:100px;">
        <a href="index.php">
         <img src="images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
        </a>
    </div>
<div style="padding-top:80px;">


    <?php

        $produit = $_GET['produit'];
    $req = "SELECT * from producttb where id=".$produit;
    $query = $bdd->prepare($req);
    $query->execute();
    $results = $query->fetchAll();
    foreach ($results as $result) {
        $result['product_image'] = substr($result['product_image'], 3);
        
       ?>
    <div class="container mb-5">
        <div class="row">

            <div class="col-md-6 text-center">
                <img class="img-responsive w-75" src="<?php echo $result['product_image'] ?>">
            </div>
            <div class="col-md-6 text-center ">
                <h4> <?php echo $result['product_name'] ?></h4>
                 <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                <h5> <?php echo $result['description'] ?></h5>
               
                <form class="form-group" method="post">
                    <div >
                    <label  for="livraison" class="form-label">date de livraison</label>
                    <input type="date" class="form-control" id="livraison" name="livraison" aria-describedby="indicformat" placeholder="Delai de livraison">
                    <small id="indicformat" class="form-text text-muted">mois/jour/année.</small>
                    </div></br>
                    <input type="text" class="form-control" name="mot" placeholder="Texte sur le gateau"></br>
                    <input type='hidden' name='product_id' value=<?php echo $result['id'] ?>>
                    
                    
                    <div class="row pt-2">
                    
                <?php

                $photos = "SELECT * FROM parfum ORDER BY id";
                $query=$bdd->prepare($photos);
                $query->execute();
                $donnee=$query->fetchAll();
                foreach ($donnee as $donnee) {
                    $donnee['photo_parfum'] = substr($donnee['photo_parfum'], 3);
            ?>
            
            <div class="mx-auto row">
                
            
                 
                  <label for='parfum' value="<?php echo $donnee['id']?>" style="cursor:pointer;">
                  <input type='radio' name='parfum[]'  value='<?php echo $donnee['nom_parfum']?>' id='parfum' required>
                   
                         <img class='img-responsive' alt="<?php echo $donnee['nom_parfum']?>" style='width: 8rem;' src='<?php echo $donnee['photo_parfum']?>'>
                        <p class='text-center font-weight-bold'><?php echo $donnee['nom_parfum']?></p>
                        </label>
                      
               </div>
                            
                 

                <?php
                    }
                ?>
                
    </div>
    
    <div class=" row pt-2 pb-2">
                 <?php
                $sql = "SELECT * from taille";
                $query = $bdd->prepare($sql);
                $query->execute();
                $taille = $query->fetchAll();
                foreach ($taille as $value) {
                  
                 ?>
                <div class=" card mx-auto pb-2" style="width: 6rem;">
                    <label class="card-title" for="taille">taille <?php echo $value['taille'] ?></label>
                    <input type="radio" name="taille[]" id="taille"  value="<?php echo $value['prix'] ?>" onclick="calcul()" required>
                    <p class="card-text"><?php echo $value['portion'] ?>Portions</p>
                    <p class="card-text font-weight-bold"><?php echo $value['prix'] ?>FCFA</p>
                    
                </div>
                  <?php
                  
                }
                ?>
        </div>
                
            
            <div>
                <input type="submit" class="form-control btn btn-primary" name="add" value="Ajouter au panier"></br></br>
                <input type="submit" class="form-control btn btn-primary" name="payer" value="Payer"></br>
            </div>

            </form>
                
            </div>
        </div>
    </div>
   

       <?php
    }

?>

<div class="pb-5 pt-5 container text-center ">
        <h5 style="font-family: 'BallparkWeiner'; font-size:50px;">Continuer mes achats!</h5>
       
        
        <div class="row">
        <?php
       
       

        $photos=$bdd->query("SELECT * FROM producttb where id !='$produit' ORDER BY id ");
        while ($donnee=$photos->fetch())
        {
            $donnee['product_image'] = substr($donnee['product_image'], 3);
    ?>
    
         <?php echo ' <div class=" col-md-3  row pt-5">
                            
                    <div class="card mx-auto" style="width: 14rem;border:none;">';

            echo '<img src=" ' . $donnee['product_image'] . '">';
            echo " <form method='post'>";
            echo "<input type='hidden' value='$donnee[id]' name='produit'>";
            echo"<input class='btn  btn-primary'  type='submit' value='commandez' name='achat' >";
            echo "</form>";
       
          echo '</div>
                    </div>'
            ?>

    <?php
        }
    ?>
    </div>
    
   
    </div>
<?php include('include/footer.php')?>
</div>
<script>
 
</script>
<script scr="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
</body>
</html>