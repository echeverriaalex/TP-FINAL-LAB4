<?php
    use Models\Company;
    $company = new Company();
    
     if(isset($_SESSION["email"])) {
          if($_SESSION["role"] != "admin") {
               header("location: " . FRONT_ROOT . "User/ShowUserHome");
          }
     } else {
          header("location: " . FRONT_ROOT . "Home/Index");
     }
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Edit Company</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/Edit" method="post" class="bg-light-alpha p-5">
                    <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <input type="hidden" name="currentName" value="<?php $name; ?>">
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="<?php $name; ?>" class="form-control text-light">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Address</label>
                                   <input type="text" name="address" value="<?php $address; ?>" class="form-control text-light">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Phone</label>
                                   <input type="text" name="phone" value="<?php $phone ;?>" class="form-control text-light">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Cuit</label>
                                   <input type="text" name="cuit" value="<?php $cuit; ?>" class="form-control text-light">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Save changes</button>
               </form>
          </div>
     </section>
</main>