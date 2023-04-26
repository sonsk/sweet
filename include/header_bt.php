<style>
    #cart_count{
    text-align: center;
    padding: 0 0.9rem 0.1rem 0.9rem;
    border-radius: 3rem;
}
</style>
<header>
    

                <div class="container-fluid up" >
                <nav class="navbar sticky-top  flex-md-nowrap p-0 shadow">
                    <div class="row">
                        <p class="ml-2 ">Sweet by Kjohn's</p>
                    </div>

                    <div class="row">
                  
                        <a href="panier.php" class="nav-item nav-link active" style="color: black;">
                            <h5 class="px-5 cart">
                                
                                <img src="./images/panier.png" alt="cart" class="" width="30" height="35">
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
                   
                        <!-- <a class="" href="logout.php">
                        <img src="image/logout.png" alt="Logout" class="mr-2" width="30" height="35"  >
                        </a> -->
                    </div>
                    </nav>
                </div>

      
                     
                <!-- <div class=" col-12  py-1">
                <a href="index.php">
                    <img src="images/sk.jpg" class="rounded mx-auto d-block  logo" alt="logo">
                </a>
                </div>
         -->
        
    
</header>