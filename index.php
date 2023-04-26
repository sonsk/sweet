<?php
session_start();
unset($_SESSION['alogin']);
require('link.php');
require('dbconnection.php');

if (isset($_POST['achat']) && isset($_POST['produit'])) {
    $prod = $_POST['produit'];
    header('location:achat.php?produit=' . $prod);
}
if (isset($_POST['boutique'])) {
   
    header('location:boutique.php');
}

?>
<style>
    .jumbotron {
  color: white;
  background-image: url("images/cookies.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-25">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/sweet.png" type="images/jpg"/>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Accueil</title>
</head>

<body>
    <div class="" style="position: fixed; width: 100%; z-index:999;">
    <?php include('include/header.php'); ?>
    </div>
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 pt-4">SWEETY KJOHNS</h1>
    <h5>vos occasions speciales</br> encore plus speciales</h5>
   
  </div>
  <div class="container mx-auto d-flex justify-content-end">
    <a class="btn btn-primary" href="boutique.php">
        boutique
    </a>
  </div>
</div>

  <div class="" style="padding-top:80px;">

    <div class='text-center  '>
        <h5 style="font-family: 'BallparkWeiner'; font-size:50px;">Nos réalisations</h5>
        
        <div class=' row pt-3' >
        
            <div class=" card  mx-auto" style="width: 14rem;border:none;"data-aos="fade-up" data-aos-duration="2000" >
                 <img class="card-img-top" src="images/cake1.jpg" alt="Card image cap">
            </div>
            <div class=" card mx-auto" style="width: 14rem;border:none;"data-aos="fade-up" data-aos-duration="2000">
                <img class="card-img-top" src="images/cake2.jpg" alt="Card image cap">
            </div>
            <div class=" card mx-auto" style="width: 14rem;border:none;"data-aos="fade-up" data-aos-duration="2000">
                <img class="card-img-top" src="images/cake3.jpg" alt="Card image cap">
            </div>
            <div class=" card mx-auto" style="width: 14rem;border:none;"data-aos="fade-up" data-aos-duration="2000">
                <img class="card-img-top" src="images/cupcake.jpg" alt="Card image cap">
            </div>
        
        </div>
    </div>
    <button class="btn btn-primary " data-aos="fade-left" data-aos-duration="3000">
        <a href="realisations.php" style="color: white; text-decoration:none; cursor:pointer;">plus de photos<span><i class="fas fa-plus faw float-right"></i></span></a>
    </button>


    <div class="pb-5 pt-5 container text-center ">
    <hr class="featurette-divider">
        <h5 style="font-family: 'BallparkWeiner'; font-size:50px;">Les plus commandés!</h5>
       
        
        <div class="row">
        <?php 
       
       

        $photos=$bdd->query('SELECT * FROM producttb ORDER BY id ');
        while($donnee=$photos->fetch())
        {
            $donnee['product_image'] = substr($donnee['product_image'], 3);
    ?>
    
         <?php echo ' <div class=" col-md-3  row pt-5">
                            
                    <div class="card mx-auto" style="width: 14rem;border:none;">';

            echo '<img src=" ' . $donnee['product_image'] . '" style="height:200px;">';
            echo " <form method='post'>";
            echo "<input type='hidden' value='$donnee[id]' name='produit'>";
            echo"<input class='btn  btn-primary'  type='submit' value='Acheter' name='achat' >";
         
            /* echo"<input class='btn  btn-primary '  type='submit' value='Visitez la boutique' name='boutique' >"; */
            echo "</form>";
       
          echo '</div>
                    </div>'
            ?>

    <?php
        }
    ?>
    </div>
    
   
    </div>
    
    <div class=" container text-center " data-aos="fade-up" data-aos-duration="2000">
    <hr class="featurette-divider">
        <h5 style="font-family: 'BallparkWeiner'; font-size:50px;">A propos de nous!</h5>
        <div class="row">
            <div class="col-md-5 order-md-1">
            <img src="images/patissiere.jpg" class="rounded mx-auto img-responsive" alt="" width="250" height="255">
            </div>
            <div class="col-md-7 order-md-2 text-center">
            <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">
                Chez SweetbyKjohn's, nous croyons que la vie est trop courte pour ne pas profiter d'une gâterie sucrée. 
                Nous sommes passionnés par la création de délicieux gâteaux  qui font sourire tout le monde. 
                Notre patisserie ne fait intervenir que les ingrédients les plus frais et les meilleures recettes pour créer des gâteaux qui rendront vos occasions spéciales encore plus spéciales. 
                Nous nous efforçons de vous offrir une expérience unique à chaque fois que vous nous rendez visite.
                Alors commandez et laissez-nous vous aider à célébrer les moments de la vie avec nos succulantes créations !
                </p>
            </div>
        </div>
        <hr class="featurette-divider">
    </div>
    <!-- <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg  src="images/patissiere.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider"> -->
    <div class="container">
    <div class="text-center " data-aos="fade-up" data-aos-duration="2000">
        <h5 style="font-family: 'BallparkWeiner'; font-size:50px;">Personnalisez vos commandes!</h5>
    </div>
    <div class="row mr-auto text-center pt-5 " >
        
        <div class="col-md-3 card mx-auto" style="width: 25rem;border:none;"data-aos="fade-up" data-aos-duration="2000">
            <img class="card-img-top" src="images/cake.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cake</h5>
                        <p class="card-text">Des gâteaux personnalisables pour tous vos évènements.</p>
                            <a href="user/commande_cake.php" class="btn btn-primary"><i class="fa fa-cart-shopping"></i>commandez</a>
                            
                </div>
        </div>
    
        <div class="col-md-3 card mx-auto" style="width: 25rem;border:none;" data-aos="fade-up" data-aos-duration="2000">
            <img class="card-img-top" src="images/cupcake.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cup cake</h5>
                        <p class="card-text">Des cup cake en apéro? commandez!!.</p>
                            <a href="user/commande_cup.php" class="btn btn-primary"><i class="fa fa-cart-shopping"></i>commandez</a>
                            
                </div>
        </div>
        <div class="col-md-3 card mx-auto" style="width: 25rem;border:none;"data-aos="fade-up" data-aos-duration="2000">
            <img class="card-img-top" src="images/cookies.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Cookies</h5>
                        <p class="card-text">Des cookies pour vos receptions chez k-john's.</p>
                            <a href="user/commande_burger.php" class="btn btn-primary"><i class="fa fa-cart-shopping"></i>commandez</a>
                            
                </div>
        </div>
   
    </div>
    <hr class="featurette-divider">
    </div>
    <div class="text-center pt-2 pb-4 " data-aos="fade-up" data-aos-duration="3000">
    
        <h5 style="font-family: 'BallparkWeiner'; font-size:50px;">Nous trouver?!</h5>
        
    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.8047901503464!2d9.764160514848387!3d4.060182448008502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610dad69ec7969%3A0x523a6d4eb5a271b9!2sPharmacie%20Santa%20Rosa!5e0!3m2!1sfr!2scm!4v1657547520669!5m2!1sfr!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        
    </div>

    <?php
        include('include/footer.php')
    ?>
</div>


</body>
<script>
  AOS.init();
</script>

</html>