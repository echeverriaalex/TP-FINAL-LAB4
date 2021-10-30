<?php
    require_once('nav-admin.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Student</h2>
               <form action="<?php echo FRONT_ROOT ?>Student/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">First Name</label>
                                   <input type="text" name="name" value="" class="form-control" autofocus>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Last Name</label>
                                   <input type="text" name="surname" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">DNI</label>
                                   <input type="text" name="dni" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Phone Number</label>
                                   <input type="text" name="phone" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">ID</label>
                                   <input type="text" name="id" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Save</button>
               </form>
          </div>
     </section>
</main>