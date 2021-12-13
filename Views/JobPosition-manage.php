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
                         <th>Job Position Id</th>
                         <th>Salary</th>
                         <th>Options</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobOfferList as $jobOffer){
                         ?>
                                <tr>
                                    <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                    <td><?php echo $jobOffer->getJobPositionId(); ?></td>
                                    <td><?php echo $jobOffer->getSalary(); ?></td>
                            
                                    <td> 
                                        <form method="POST" action="<?php echo FRONT_ROOT?>JobOffer/Delete">
                                            <input type="hidden" name="companyName" value="<?php echo $jobOffer->getCompanyName(); ?>">
                                            <button> Delete </button> 
                                        </form>

                                        <form method="POST" action="<?php echo FRONT_ROOT?>jobOffer/ShowEditView">
                                            <input type="hidden" name="jobOfferName" value="<?php echo $jobOffer->getCompanyName(); ?>">                                            
                                            <input type="hidden" name="jobPositionId" value="<?php echo $jobOffer->getJobPositionId(); ?>">
                                            <input type="hidden" name="salary" value="<?php echo $jobOffer->getSalary(); ?>">                                                       
                                            <button> Edit </button>
                                        </form>
                                    </td>
                                </tr>
                         <?php
                              }
                         }
                         else{
                         ?>
                              <div class="">
                                   <div class="">
                                        <h2 > <?php echo "No results found"; ?> </h2>
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