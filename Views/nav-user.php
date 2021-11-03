<nav class="navbar navbar-expand navbar-admin ">
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT?>Student/IndexStudent">Linkedon</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <!--
        <li class="nav-item">
            <a class="nav-link text-light" href="#">Information</a>
        </li>
        -->

        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo FRONT_ROOT?>Company/ShowListView">Company List</a>
        </li>

        <li>
          <a class="nav-link text-light" href="<?php echo FRONT_ROOT?>Student/ShowMyProfile">Profile</a>
        </li>

        <?php if(isset($_SESSION['email'])) { ?>
            <li><a class="nav-link text-light" href="<?php echo FRONT_ROOT?>User/LogOut">LogOut</a></li>
        <?php	} ?>  
      </ul>
    </div>
  </div>
</nav>