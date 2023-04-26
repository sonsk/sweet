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
                   <!--  <div class=" row d-md-none d-block" style="">
                        <a href="index.php">
                            <img src="images/log.png" class="rounded mx-auto d-block  logo" alt="logo" >
                        </a>
                    </div> -->

                    <div class="row ">
                        <a href="./user/login.php" class="nav-link" style="color: black;">
                            <img src="../images/avatar.png" alt="login" class="mr-2" width="30" height="35">
                        </a>

                        <a href="panier.php" class="nav-link " style="color: black;">
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