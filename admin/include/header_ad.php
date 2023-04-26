<style>
    #cart_count{
    text-align: center;
    padding: 0 0.9rem 0.1rem 0.9rem;
    border-radius: 3rem;
}

</style>
<header>

<nav class="navbar up sticky-top  flex-md-nowrap p-0 shadow" id="abId0.4566224469616851" abineguid="90B0BD0115E0491B88D1B4501939B6CE">
    <p class="ml-2 ">Sweet by Kjohn's</p>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">

    <span>
    <img class="img-responsive mr-2" src="../images/collapse.png" width="35" height="30">
    </span>
  </button>
  <?php
    if (isset($_SESSION['alogin'])) {
      ?>
      <a href="./logout.php">
      <img class="img-responsive mr-2" src="../images/logout.png" alt="logout" width="25" height="30">
    </a>
    <?php
    }else{
  ?>
  <a href="./login.php">
  <img class="img-responsive mr-2" src="../images/avatar.png" alt="login" width="25" height="30">
</a>
<?php
    }
  ?>
</nav>
<script src="js/collapse.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/button.js"></script>

</header>