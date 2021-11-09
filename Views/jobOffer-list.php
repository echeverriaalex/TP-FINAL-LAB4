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
                                    <td><?php echo $jobOffer->getCompanyName(); ?></td>
                                    <td><?php echo $jobOffer->getJobPositionId(); ?></td>
                                    <td><?php echo $jobOffer->getSalary(); ?></td>
                                    <td>
                                        <form method="POST" action="<?php echo FRONT_ROOT?>JobOffer/Postule">
                                            <input type="hidden" name="companyName" value="<?php echo $company->getName(); ?>">
                                            <button type="submit" class="btn btn-outline-danger"> Apply </button> 
                                        </form>
                                    </td>
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