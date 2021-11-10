<nav class="navbar navbar-expand navbar-admin ">
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT?>Home/Index">Linkedon</a>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Add student</a></li>
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Student/Update">Update student</a> -->
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Student/ShowManageView">Manage students</a></li>
         <!-- <li><a class="dropdown-item text-light" href="<?php //echo FRONT_ROOT ?>Company/ShowAddView">Add company</a> -->
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Company/ShowManageView">Manage companies</a>
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Administrator/ShowManageView">Manage administrator</a>
          <!--<li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>JobOffer/ShowManageView">Add job offer</a> -->
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>JobOffer/ShowManageView">Manage job offers</a>
         <!-- <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Career/Update">Update Careers</a>  -->
          <li><a class="dropdown-item text-light" href="<?php echo FRONT_ROOT ?>Career/ShowManageView">Manage career</a>

          <?php if(isset($_SESSION['userlogged'])) { ?>
                    <li><a class="nav-link text-light" href="<?php echo FRONT_ROOT?>User/LogOut">Log Out</a></li>
          <?php } ?>
     </div>
  </div>
</nav>