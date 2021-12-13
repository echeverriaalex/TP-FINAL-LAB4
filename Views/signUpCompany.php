<div class="main-banner" id="top">
  <div class="container ">
    <div class="abs-center">
      <div class="row align-items-center ">
        <div class="">
          <div class="row align-items-center ">
            <div class="align-self-center">
              <div class="item header-text align-items-center  ">
                <h6>Linkedon</h6>
                <h2>>Sign Up as Company</h2>
                <form action="<?php echo FRONT_ROOT ?>User/AddCompany" method="post" class="row align-items-center mt-5">
                  <div class=" div-form">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control text-light" id="inputEmail4" required autofocus>
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

                  <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="" class="form-control text-light" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Address</label>
                                   <input type="text" name="address" value="" class="form-control text-light" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">CUIT</label>
                                   <input type="text" name="cuit" value="" class="form-control text-light" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Phone</label>
                                   <input type="text" name="phone" value="" class="form-control text-light" required>
                              </div>
                         </div>
                    </div>
                  <div class="col-12 mt-5">
                    <button type="submit" class="btn btn-primary">Sign In</button>
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