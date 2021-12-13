<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Job Offer</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Company Name</label>
                                   <?php
                                        if($_SESSION['userlogged']->getRole() == "company"){
                                   ?>
                                             <input name="company" class="form-control text-light" value="<?php echo $_SESSION['userlogged']->getName(); ?>">
                                   <?php
                                        }
                                        else{
                                   ?>
                                             <select name="company" class="form-select" required>
                                                  <?php
                                                       foreach($companyList as $company){
                                                  ?>
                                                            <option value="<?php echo $company->getName(); ?>"> <?php echo $company->getName(); ?> </option>
                                                  <?php        
                                                       }
                                                  }
                                                  ?>
                                             </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Job Position</label>
                                   <select name="jobPosition" class="form-select" required>

                                        <?php
                                             foreach($jobPositionList as $jobPosition){
                                        ?>
                                                  <option value="<?php echo $jobPosition->getId(); ?>"> <?php echo $jobPosition->getDescription(); ?> </option>
                                        <?php
                                             }
                                        ?>
                                    </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Salary</label>
                                   <input type="number" name="salary" value="" class="form-control text-light">
                              </div>
                         </div>
                         
                         <!--
                         <div class="col-lg-4">
                              <input type="file" name="photo" required>
                         </div>
                         -->                        

                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">URL image</label>
                                   <input type="url" name="photo" value="" class="form-control text-light">
                              </div>
                         </div>

                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Creation Date</label>
                                   <input type="datetime-local" name="createDate" value="time" class="form-control text-light" >
                              </div>
                         </div>
                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Culmination</label>
                                   <input type="datetime-local" name="culmination" value="" class="form-control text-light">
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="form-group">
                              <button type="submit" class="btn btn-dark ml-auto d-block">Create job offer</button>
                         </div>
                    </div>
               </form>
          </div>          
     </section>
</main>