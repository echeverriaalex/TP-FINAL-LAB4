<?php 
     if(isset($_SESSION["email"])) {
          if($_SESSION["role"] != "admin") {
               header("location: " . FRONT_ROOT . "User/ShowUserHome");
          }
     } else {
          header("location: " . FRONT_ROOT . "Home/Index");
     }
     
?>

<nav class="navbar navbar-expand navbar-admin ">
  <div class="container-fluid ">    
    <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT?>Home/Index">Linkedon</a>    
    <!--  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"> Span </span>
    </button> -->    
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Add student</a></li>
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Student/ShowManageView">Manage students</a></li>
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Add company</a>
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Company/ShowManageView">Manage companies</a>
          <?php if(isset($_SESSION['email'])) { ?>
                    <li><a class="nav-link text-light" href="<?php echo FRONT_ROOT?>User/LogOut">Log Out</a></li>
          <?php } ?>
     </div>
  </div>
</nav>