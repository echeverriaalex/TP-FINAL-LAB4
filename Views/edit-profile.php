<?php
    require_once('nav.php');

    use Models\Student;
    $student = new Student("Alex", "Echeverria", "40885197", "2235127491", "898907");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Edit profile</h2>
               <form action="<?php echo FRONT_ROOT ?>Student/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
<<<<<<< Updated upstream:Views/edit-profile.php
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="<?php echo $student->getName();?>" class="form-control">
=======
                                   <input type="hidden" name="currentName" value="<?php //echo $name; ?>">
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="<?php //echo $name; ?>" class="form-control text-light">
>>>>>>> Stashed changes:Views/company-edit.php
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
<<<<<<< Updated upstream:Views/edit-profile.php
                                   <label for="">Surname</label>
                                   <input type="text" name="surname" value="<?php echo $student->getSurname();?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">DNI</label>
                                   <input type="text" name="dni" value="<?php echo $student->getDNI();?>" class="form-control">
=======
                                   <label for="">Address</label>
                                   <input type="text" name="address" value="<?php //echo $address; ?>" class="form-control text-light">
>>>>>>> Stashed changes:Views/company-edit.php
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Phone</label>
<<<<<<< Updated upstream:Views/edit-profile.php
                                   <input type="text" name="phone" value="<?php echo $student->getPhone();?>" class="form-control">
=======
                                   <input type="text" name="phone" value="<?php //echo $phone ;?>" class="form-control text-light">
>>>>>>> Stashed changes:Views/company-edit.php
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
<<<<<<< Updated upstream:Views/edit-profile.php
                                   <label for="">ID</label>
                                   <input type="text" name="id" value="<?php echo $student->getId();?>" class="form-control">
=======
                                   <label for="">Cuit</label>
                                   <input type="text" name="cuit" value="<?php //echo $cuit; ?>" class="form-control text-light">
>>>>>>> Stashed changes:Views/company-edit.php
                              </div>
                         </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Save changes</button>
               </form>
          </div>
     </section>
</main>