<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage applicants </h2>
                <?php
                    use DAO\JobPositionPDO;
                    
                    if(!empty($applicationList)){
                ?>
                <table class="table bg-light-alpha">
                    <thead>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Company</th>
                        <th>Photo</th>
                        <th>Salary</th>
                        <th>Job position</th>
                        <th>Options</th>
                    </thead>
                    <tbody>                        
                        <?php
                            foreach($applicationList as $application){
                        ?>
                        <tr>
                            <?php
                                foreach($studentList as $student){
                                    if($application->getStudentId() == $student->getStudentId()){
                                        $studentEmail = $student->getEmail();
                            ?>
                                        <td><?php echo $student->getFirstName(); ?></td>
                                        <td><?php echo $student->getLastName(); ?></td>
                            <?php
                                    }   
                                }
                                foreach($jobOfferList as $jobOffer){
                                    if($jobOffer->getId() == $application->getJobOfferId()){
                            ?>
                                        <td><?php echo $jobOffer->getNameCompany(); ?></td>
                                        <td> <img src="<?php echo $jobOffer->getPhoto();?>"> </td>
                                        <td><?php echo $jobOffer->getSalary(); ?></td>
                            <?php                
                                    }
                                }
                                
                                foreach(JobPositionPDO::getJobPositionListApi() as $jobPosition){
                                    if($jobOffer->getJobPositionId() == $jobPosition->getId()){
                            ?>
                                        <td><?php echo $jobPosition->getDescription(); ?></td>
                            <?php
                                        }
                                    }
                            ?>
                                    <td> 
                                        <form method="POST" action="<?php echo FRONT_ROOT?>Application/Delete">
                                            <input type="hidden" name="id" value="<?php echo $application->getId(); ?>">
                                            <input type="hidden" name="emailStudent" value="<?php echo $studentEmail; ?>">
                                            <button type="submit" class="btn btn-outline-danger"> Delete </button> 
                                        </form>
                                    </td>
                        <?php
                            }
                        ?>  
                        </tr>
                    <?php
                    }else{
                    ?>
                         <div class="list-group">
                              <div class="col-lg-4">
                                   <h2 class=""> <?php echo "No results found"; ?> </h2>
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