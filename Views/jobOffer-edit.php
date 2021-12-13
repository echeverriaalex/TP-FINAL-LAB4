<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Edit Job Offer</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/Edit" method="post" class="bg-light-alpha p-5">
                    <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <input type="hidden" name="currentId" value="<?php echo $id; ?>">
                                   <label for="">Company Name</label>
                                   <?php
                                        use DAO\CompanyPDO;
                                        if($_SESSION['userlogged']->getRole() == "company"){
                                   ?>
                                             <input name="company" class="form-control text-light" value="<?php echo $_SESSION['userlogged']->getName(); ?>">
                                   <?php
                                        }
                                        else{
                                   ?>
                                             <select name="company" class="form-select" required>
                                                  <?php                                      
                                                       $companyPDO = new CompanyPDO();
                                                       $companyList = $companyPDO->GetAll();
                                                       
                                                       foreach($companyList as $company){
                                                  ?>
                                                            <option value="<?php echo $company->getName();?>"> <?php echo $company->getName(); ?> </option>
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
                                             use DAO\JobPositionPDO;
                                             $jobPositionList = JobPositionPDO::getJobPositionListApi();
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
                                   <input type="number" name="salary" value="<?php echo $salary ;?>" class="form-control text-light">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">URL photo</label>
                                   <input type="url" name="photo" value="<?php echo $photo; ?>" class="form-control text-light">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Save changes</button>
               </form>
          </div>
     </section>
</main>