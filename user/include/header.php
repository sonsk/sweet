<style>
    #cart_count{
    text-align: center;
    padding: 0 0.9rem 0.1rem 0.9rem;
    border-radius: 3rem;
}

</style>
<link type="text/css" href="../style.css" rel="stylesheet"/>
<header>
    

                <div class="container-fluid up" >
                <nav class="navbar sticky-top  flex-md-nowrap p-0 shadow">
                    <div class="row">
                        <p class="ml-2 ">Sweet by Kjohn's</p>
                    </div>
                  

                    <div class="row ">
                    <?php
                        if (isset($_SESSION['login'])) {
                            $nom = $_SESSION['login']['nom'];
                            ?>
                           <div class="dropdown">
                                <h5 class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $nom;?>
                                </h5>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="logout.php">Deconnexion</a>
                                    <a class="dropdown-item" href="#">Profil</a>
                                    <a class="dropdown-item" href="#">Paramètres</a>
                                </div>
                            </div>
  
                            <?php
                        }else {
                         ?>
                        <a href="login.php" class="nav-link" style="color: black;">
                            <img src="../images/avatar.png" alt="login" class="mr-2" width="30" height="35">
                        </a>
                            <?php
                        }
                        ?>

                        <a href="../panier.php" class="nav-link " style="color: black;">
                            <h5 class=" cart">
                            <img src="../images/panier.png" alt="cart" class="mr-2" width="30" height="35">
                                <?php

                                if (isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                }else  {
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                }

                                ?>
                            </h5>
                        </a>
                   
                        
                    </div>
                    </nav>
                </div>

</header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>