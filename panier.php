<?php

session_start();

unset($_SESSION['alogin']);
require('link.php');
require('dbconnection.php');

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('le produit a été retiré...!')</script>";
              echo "<script>window.location = 'panier.php'</script>";
          }
      }
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
    
    <link rel="shortcut icon" href="images/sk.jpg" type="images/jpg"/>
   
    <title>Panier</title>
</head>
<body class="">

<div class="pb-2" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>
    <div class=" col-12 " style="padding-top:100px;">
        <a href="index.php">
         <img src="images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
         
        </a>
    </div>
  <div class="" style="padding-top:80px;">

<div class="container-fluid" style="padding-top:80px;">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Mon panier</h6>
                <hr>

                <?php

                $total = 0;
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    echo "<img src='images/add_to_cart.png' class='rounded mx-auto d-block  logo' alt='' >";
                 
                }elseif (isset($_SESSION['cart'])) {
                    
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $parf = array_column($_SESSION['cart'], 'parfum');
                        $price = array_column($_SESSION['cart'], 'price');

                        foreach ($product_id as $id) {
                        $req = "SELECT * from producttb where id=".$id;
                        $query = $bdd->prepare($req);
                        $query->execute();
                        $results = $query->fetchAll();
                        foreach ($results as $result) {
                            $result['product_image'] = substr($result['product_image'], 3);
        
                    
                    ?>
                      <form action="panier.php?action=remove&id=<?php echo $result['id']?>" method="post" class="cart-items">
                    <div class="border rounded">
                        <div class="row bg-white">
                            <div class="col-md-3 pl-0">
                                <img src="<?php echo $result['product_image']?>" alt="Image1" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5 class="pt-2"><?php echo $result['product_name']?></h5>
                                
                                
                                <small class="text-secondary"><?php echo "parfum"?></small>
                                
                                <h5 class="pt-2"><?php echo $result['product_price']?>  fcfa</h5>
                                <button type="submit" class="btn btn-warning">Garder</button>
                                <button type="submit" class="btn btn-danger mx-2" name="remove">Retirer</button>
                            </div>
                            <div class="col-md-3 py-5">
                                <div>
                                    <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                                    <input type="text" value="1" class="form-control w-25 d-inline">
                                    <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                     <?php 
                     $total = $total + (int)$result['product_price'];
                       }  
                    } 
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
        <img src="images/payment.png" class="rounded mx-auto d-block  logo" alt="logo" >
            <div class="pt-4">
                <h6>DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Prix ($count articles)</h6>";
                            }else {
                                echo "<h6>Prix (0 article)</h6>";
                            }
                        ?>
                        <h6>Frais de livraison</h6>
                        <hr>
                        <h6>Adresse</h6>
                        
                        <h6>Total à payer</h6>
                        

                    </div>
                    <div class="col-md-6">
                        <h6><?php echo $total; ?>FCFA</h6>
                        <h6 class="text-success">GRATUIT</h6>
                        <hr>
                        
                                <?php
                            if (!isset($_SESSION['login'])) {
                                    echo "<h6 class='text-danger'>!Veuillez vous connecter!</h6>";
                            }else{
                                $adresse=$_SESSION['login']['adresse'];

                                    echo "<h6 class='text-success'> $adresse</h6>";
                            }
                            ?>
                        <h6><?php
                            echo $total;
                            ?>FCFA</h6>
                           
                    </div>
                </div>
            </div>
            <div class="row mx-auto pt-2 text-center justify-content-between">
            <button type="submit" class="btn btn-success " name="discuss">La patissière   <i class="fa-brands fa-whatsapp"></i></button>
            <button type="submit" class="btn btn-secondary" name="discuss" data-toggle="modal" data-target="#paiement">Procéder au paiement   <i class="fas fa-cart"></i></button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="paiement" tabindex="-1" role="dialog" aria-labelledby="Paiement" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="paiementNondispo">Passerelle de paiement indisponible pour le moment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container text-center">
                    
                    <hr>
                    <img src="images/erreur_paiement.png" class="rounded mx-auto d-block  logo" alt="logo" >
        
        </div>
                    
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success " name="discuss">La patissière   <i class="fa-brands fa-whatsapp"></i></button>
        <button type="button" class="btn " data-dismiss="modal">Fermer</button>
        
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<div class="pt-5">
<?php
        include('include/footer.php')
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
