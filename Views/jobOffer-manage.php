<?php 
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
               <h2 class="mb-4"> Manage Job Offers </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Company Name</th>
                         <th>Job Position Id</th>
                         <th>Salary</th>
                         
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

                                        <form method="POST" action="<?php echo FRONT_ROOT?>Company/ShowEditView">
                                            <input type="hidden" name="companyName" value="<?php echo $jobOffer->getCompanyName(); ?>">                                            
                                            <input type="hidden" name="jobPositionId" value="<?php echo $jobOffer->getJobPositionId(); ?>">
                                            <input type="hidden" name="salary" value="<?php echo $jobOffer->getSalary(); ?>">                                                       
                                            <button> Edit </button>
                                        </form>
                                    </td>
                                </tr>
                         <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>