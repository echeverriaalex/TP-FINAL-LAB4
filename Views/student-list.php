<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Students registered in the system </h2>
                    <table class="table bg-light-alpha">
                         <thead>
                              <th>ID</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>DNI</th>
                              <th>E-mail</th>
                              <th>Phone Number</th>
                              <th>Career</th>
                              <th>File number</th>
                              <th>Gender</th>
                              <th>Birth date</th>
                              <!-- <th>Status</th> -->
                         </thead>
                         <tbody>
                              <?php
                                   use DAO\CareerPDO;
                                   foreach($studentListRegistered as $student){
                              ?>
                                        <tr>
                                             <td><?php echo $student->getStudentId(); ?></td>
                                             <td><?php echo $student->getFirstName(); ?></td>
                                             <td><?php echo $student->getLastName(); ?></td>
                                             <td><?php echo $student->getDni(); ?></td>
                                             <td><?php echo $student->getEmail(); ?></td>
                                             <td><?php echo $student->getPhoneNumber(); ?></td>                                          
                                             <td>
                                                  <?php 
                                             
                                                  $careerList = CareerPDO::getCareerListApi();
                                                  foreach($careerList as $career){
                                                       if($career->getCareerId() == $student->getCareerId())
                                                            echo $career->getDescription();}
                                                  ?> 
                                             </td>
                                             <td><?php echo $student->getFileNumber(); ?> </td>
                                             <td><?php echo $student->getGender(); ?> </td>
                                             <td><?php echo $student->getBirthDate(); ?> </td>
                                             <!-- <td><?php //echo $student->getActive(); ?> </td> -->
                                        </tr>
                              <?php
                                   }
                              ?>
                         </tbody>
                    </table>
          </div>
     </section>
</main>