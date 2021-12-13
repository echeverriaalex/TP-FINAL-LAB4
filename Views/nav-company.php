<nav class="navbar navbar-expand navbar-admin ">
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT?>Home/Index">Linkedon</a>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- <li><a class="dropdown-item text-light" href="<?php //echo FRONT_ROOT ?>Student/ShowManageView">Manage students</a></li> -->
          <!-- <li><a class="dropdown-item text-light" href="<?php //echo FRONT_ROOT ?>Company/ShowManageView">Manage companies</a> -->
          <li> <a class="nav-link text-light" href="<?php echo FRONT_ROOT?>Company/ShowProfileCompany">Profile</a> </li>
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>JobOffer/ShowManageView">Manage job offers</a>
          <?php if(isset($_SESSION['userlogged'])) { ?>
                    <li><a class="nav-link text-light" href="<?php echo FRONT_ROOT?>User/LogOut">Log Out</a></li>
          <?php } ?>
     </div>
  </div>
</nav>