<?php namespace Views;?>

<div class="main-banner" id="top">
    <div class="container col-12 met-5 ">
    <div class="abs-center">
      <div class="row align-items-center mt-2">
        <div class="col-lg-12">
          <div class="row align-items-center ">
            <div class="col-lg-6 align-self-center">
              <div class="item header-text align-items-center  ">
                <h6>Linkedon</h6>
                <h2>>Sign Up</h2>
                <form action="<?php FRONT_ROOT ?>User/Add" method="post" class="row align-items-center mt-5">
                  <div class="col-md-6 div-form">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control text-light" id="inputEmail4">
                  </div>
                  <div class="col-md-6 div-form">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control text-light" id="inputPassword4" >
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

