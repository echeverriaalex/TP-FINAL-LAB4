<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Job Offer List </h2>

               <?php
                    if(!empty($jobOfferList)){
               ?>
               <table class="table bg-light-alpha">
                    <thead>
                        <th>Company Name</th>
                        <th>Job Position Id</th>
                        <th>Salary</th>
                        <th>Option</th>
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

                                        <td> <?php echo $jobOffer->getSalary(); ?> </td>
                                        
                                        <td>
                                             <form method="POST" action="<?php echo FRONT_ROOT?>Application/Add"> 
                                                  <input type="hidden" name="jobOfferId" value="<?php echo $jobOffer->getId();?>">  
                                                  <input type="hidden" name="studentId" value="<?php echo $_SESSION['userlogged']->getStudentId();?>">                                                  
                                                  <button type="submit" class="btn btn-outline-danger"> Apply </button>
                                             </form>
                                        </td>

                                        <!--
                                        <form method="POST" action="<?php //echo FRONT_ROOT?>jobOffer/Apply">
                                             <input type="hidden" name="jobOfferName" value="<?php //echo $jobOffer->getCompanyName(); ?>">                                            
                                             <input type="hidden" name="jobPositionId" value="<?php //echo $jobOffer->getJobPositionId(); ?>">
                                             <input type="hidden" name="salary" value="<?php // echo $jobOffer->getSalary(); ?>">  
                                        </form> 
                                   </td> -->
                                </tr>
                         <?php
                         }
                    }
                    else{
                    ?>
                         <div class="list-group">
                              <div class="col-lg-4">
                                   <h2 class="text-light"> <?php echo "No results found"; ?> </h2>
                              </div>
                         </div>
                    <?php
                    }
                    ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>