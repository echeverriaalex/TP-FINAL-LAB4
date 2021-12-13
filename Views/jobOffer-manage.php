<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage Job Offers </h2>

               <div class="container">
                    <a href="<?php  echo FRONT_ROOT?>JobOffer/ShowAddView"> <h2 class="mb-2"> Add a new JobOffer </h2> </a>
               </div>
               
               <?php
                    if(!empty($jobOfferList)){
               ?>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Company Name</th>
                         <th>Job Position</th>
                         <th>Career</th>
                         <th>Salary</th>
                         <th>Photo</th>
                         <th>Creation Date</th>
                         <th>Culmination</th>
                         <th>Options</th>
                    </thead>
                    <tbody>
                         <?php
                         foreach($jobOfferList as $jobOffer){
                         ?>
                                   <tr>
                                        <td>
                                             <?php
                                                  foreach($companyList as $company){
                                                       if($company->getName() == $jobOffer->getNameCompany()){
                                                            echo $company->getName(); 
                                                       }
                                                  }
                                             ?>
                                        </td>

                                        <td>
                                             <?php
                                                  foreach($jobPositionList as $jobPosition){
                                                       if($jobPosition->getId() == $jobOffer->getJobPositionId()){
                                                            echo $jobPosition->getDescription(); 
                                                       }
                                                  }
                                             ?>
                                        </td>

                                        <td>
                                             <?php
                                                  foreach($jobPositionList as $jobPosition){
                                                       if($jobOffer->getJobPositionId() == $jobPosition->getId()){                                                            
                                                            foreach($careerList as $career){
                                                                 if($jobPosition->getCareerId() == $career->getCareerId()){
                                                                      echo $career->getDescription();
                                                                 }
                                                            }   
                                                       }
                                                  }
                                             ?>
                                        </td>

                                        <td> <?php echo $jobOffer->getSalary(); ?> </td>

                                        <td> <img src="<?php echo $jobOffer->getPhoto();?> "> </td>

                                        <td> <?php echo $jobOffer->getCreationDate();?> </td>

                                        <td> <?php echo $jobOffer->getCulmination();?> </td>
                                        
                                        <td> 
                                             <form method="POST" action="<?php echo FRONT_ROOT?>JobOffer/Delete">
                                                  <input type="hidden" name="id" value="<?php echo $jobOffer->getId(); ?>">
                                                  <button type="submit" class="btn btn-outline-danger mb-2"> Delete </button> 
                                             </form>

                                             <form method="POST" action="<?php echo FRONT_ROOT?>jobOffer/ShowEditView">
                                                  <input type="hidden" name="id" value="<?php echo $jobOffer->getId(); ?>">
                                                  <input type="hidden" name="salary" value="<?php echo $jobOffer->getSalary(); ?>">
                                                  <input type="hidden" name="companyId" value="<?php echo $jobOffer->getNameCompany(); ?>">
                                                  <input type="hidden" name="jobPositionId" value="<?php echo $jobOffer->getJobPositionId(); ?>">
                                                  <input type="hidden" name="photo" value="<?php echo $jobOffer->getPhoto(); ?>">
                                                  <button type="submit" class="btn btn-outline-primary mb-2"> Edit </button>
                                             </form>

                                             <form method="POST" action="<?php echo FRONT_ROOT?>Application/ShowApplicantsList">
                                                  <input type="hidden" name="id" value="<?php echo $jobOffer->getId(); ?>">
                                                  <button type="submit" class="btn btn-outline-success mb-2"> Applicants list </button> 
                                             </form>

                                        <?php
                                             if($_SESSION['userlogged']->getRole() == "admin"){
                                        ?>
                                             <form method="POST" action="<?php echo FRONT_ROOT?>JobOffer/GeneratePDF">
                                                  <input type="hidden" name="id" value="<?php echo $jobOffer->getId(); ?>">
                                                  <button type="submit" class="btn btn-outline-info mb-2">Generate PDF</button> 
                                             </form>
                                        <?php
                                             }
                                        ?>
                                        </td>
                                   </tr>
                    <?php 
                         }
                    }else{ ?>
                              <div class="list-group">
                                   <div class="col-lg-4">
                                        <h2 class=""> <?php echo "No results found"; ?> </h2>
                                   </div>
                              </div>
                    <?php } ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>