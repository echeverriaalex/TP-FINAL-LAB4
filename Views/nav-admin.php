

<nav class="navbar navbar-expand-lg navbar-admin ">
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="<?php echo FRONT_ROOT?>Home/Index">Linkedon</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Students
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Add student</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowEditView">Edit student</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowDeleteView">Delete student</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Student/ShowListView">Lists students</a></li>
        
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Companies
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Add company</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowEditView">Edit company</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowDeleteView">Delete company</a></li>
            <li><a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Lists companies</a></li>
          </ul>
        </li>

        <?php if(isset($_SESSION['userLog'])) { ?>
              <li><a class="dropdown-item" href="<?php echo FRONT_ROOT?>Student/logout">LogOut</a></li>


            <?php	} ?>
  
      </ul>

    </div>
  </div>
</nav>