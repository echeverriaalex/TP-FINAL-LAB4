<?php 
     if(!(isset($_SESSION["email"]))) {
        header("location: " . FRONT_ROOT . "Home/Index");
     }
?>

<nav class="navbar navbar-expand-lg navbar-admin ">
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT?>Home/Index">Linkedon</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-light" href="#">Information</a>
        </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Companies
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT?>Company/ShowListView">Company List</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowFilterView">Filter By Name</a></li>
          </ul>
        </li>

        <?php if(isset($_SESSION['email'])) { ?>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT?>User/LogOut">LogOut</a></li>
        <?php	} ?>  
      </ul>
    </div>
  </div>
</nav>