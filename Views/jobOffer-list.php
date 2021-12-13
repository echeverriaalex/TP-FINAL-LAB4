<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Job Offer List </h2>
               <?php
                    use DAO\ApplicationPDO;
                    if(!empty($jobOfferList)){
               ?>
               <table class="table bg-light-alpha">
                    <thead>
                        <th>Company Name</th>
                        <th>Job Position</th>
                        <th>Salary</th>
                        <th>Photo</th>
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

                                   <td> <img src="<?php echo $jobOffer->getPhoto();?> "> </td>

                                   <td>
                                        <?php
                                             $applicationPDO = new ApplicationPDO();
                                             $listapplications = $applicationPDO->GetAllApplications();

                                             if(!empty($listapplications)){
                                                  foreach($listapplications as $application){
                                                       if($jobOffer->getId() ==  $application->getJobOfferId() && $application->getStudentId() == $_SESSION['userlogged']->getStudentId()){
                                        ?>
                                                       <button type="submit" class="btn btn-outline-secondary"> Applied </button>
                                        <?php
                                                       }
                                                       else{
                                                       ?>
                                                            <form method="POST" action="<?php echo FRONT_ROOT?>Application/Add"> 
                                                                 <input type="hidden" name="jobOfferId" value="<?php echo $jobOffer->getId();?>">  
                                                                 <input type="hidden" name="studentId" value="<?php echo $_SESSION['userlogged']->getStudentId();?>">                                                  
                                                                 <button type="submit" class="btn btn-outline-danger"> Apply </button>
                                                            </form>
                                                       <?php
                                                       }
                                                  }
                                             }
                                             else{
                                        ?>
                                                  <form method="POST" action="<?php echo FRONT_ROOT?>Application/Add"> 
                                                       <input type="hidden" name="jobOfferId" value="<?php echo $jobOffer->getId();?>">  
                                                       <input type="hidden" name="studentId" value="<?php echo $_SESSION['userlogged']->getStudentId();?>">                                                  
                                                       <button type="submit" class="btn btn-outline-danger"> Apply </button>
                                                  </form>
                              <?php
                                             }
                              }
                                        ?>
                                   </td>
                                   

                                   <!--
                                   <form method="POST" action="<?php //echo FRONT_ROOT?>jobOffer/Apply">
                                        <input type="hidden" name="jobOfferName" value="<?php //echo $jobOffer->getCompanyName(); ?>">                                            
                                        <input type="hidden" name="jobPositionId" value="<?php //echo $jobOffer->getJobPositionId(); ?>">
                                        <input type="hidden" name="salary" value="<?php // echo $jobOffer->getSalary(); ?>">  
                                   </form>
                                   -->
                              </tr>
                    <?php
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


<!-- implementar para listar -->
<!--
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php //echo $jobOffer->getPhoto(); ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $jobOffer->getNameCompany();?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <form method="POST" action="<?php //echo FRONT_ROOT?>Application/Add"> 
          <input type="hidden" name="jobOfferId" value="<?php //echo $jobOffer->getId();?>">  
          <input type="hidden" name="studentId" value="<?php //echo $_SESSION['userlogged']->getStudentId();?>">                                                  
          <button type="submit" class="btn btn-outline-danger"> Apply </button>
     </form>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
-->