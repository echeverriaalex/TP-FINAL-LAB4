<div class="main-banner" id="top">
  <div class="container ">
    <div class="abs-center">
      <div class="row align-items-center ">
        <div class="">
          <div class="row align-items-center ">
            <div class="align-self-center">
              <div class="item header-text align-items-center  ">
                <h6>Linkedon</h6>
                <h2>>Sign Up</h2>
                <div class="container">
                  <a href="<?php echo FRONT_ROOT ?>Company/ShowSignUpAsCompany"> <h2 class="mb-2">Sign up as Company</h2> </a>
                </div>
                <form action="<?php echo FRONT_ROOT ?>User/Add" method="post" class="row align-items-center mt-5">
                  <div class=" div-form">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control text-light" id="inputEmail4" required>
                  </div>
                  <div class=" div-form">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control text-light" id="inputPassword4" required>
                    <?php
                      if($_GET && isset($_GET["msg"]))
                      {
                        switch($_GET["msg"])
                        {
                          case "incorrect":
                    ?>
                            The email entered does not belong to any student<br>
                    <?php
                          break;
                        }
                      }
                    ?>
                  </div>

                  <div class="mb-3 col-auto-center ">
                    <label for="exampleFormControlInput1" class="form-label">SignUp as</label>
                    <select name="typeUser" class="form-select" required>
                      <option name="typeUser" value="select" selected required>Selec type user</option>
                      <option name="typeUser" value="admin" required> Admin </option>
                      <option name="typeUser" value="student" required> Student </option>
                    </select>                
                  </div>
                  <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div>
  </div>
</div>