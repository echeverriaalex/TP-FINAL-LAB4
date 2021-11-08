<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage Students</h2>

               <div class="container">
                    <a href="<?php  echo FRONT_ROOT?>Student/ShowAddView"> <h2 class="mb-2"> Add a new student</h2> </a>
               </div>

               <div class="container">
                    <a href="<?php  echo FRONT_ROOT?>Student/Update"> <h2 class="mb-2"> Update Student </h2> </a>
               </div>   

               <?php
                    if(!empty($studentsList)){
               ?>

               <table class="table bg-light-alpha">
                    <thead>
                        <th> First name </th>
                        <th> Last name </th>
                        <th> Dni </th>
                        <th> E-mail </th>
                        <th> Phone number </th>
                        <th> Gender </th>
                        <th> Birth date </th>
                        <th> Student id </th>
                        <th> Carrer id </th>
                        <th> File Number </th>
                        <th> Active </th>
                        <th> Options </th>
                    </thead>
                    <tbody>
                         <?php                              
                              foreach($studentsList as $student){
                         ?>
                              <tr>
                                   <td><?php echo $student->getFirstName(); ?></td>
                                   <td><?php echo $student->getLastName(); ?></td>
                                   <td><?php echo $student->getDni(); ?></td>
                                   <td><?php echo $student->getEmail(); ?></td>
                                   <td><?php echo $student->getPhoneNumber(); ?></td>
                                   <td><?php echo $student->getGender(); ?></td>
                                   <td><?php echo $student->getBirthDate(); ?></td>
                                   <td><?php echo $student->getStudentId(); ?></td>
                                   <td><?php echo $student->getCareerId(); ?></td>
                                   <td><?php echo $student->getFileNumber(); ?></td>
                                   <td><?php if($student->getActive()) echo "Active"; else echo "No active"; ?></td>
                                    
                                   <td> 
                                        <form method="POST" action="<?php echo FRONT_ROOT?>student/Delete">
                                            <input type="hidden" name="studentName" value="<?php echo $student->getFirstName(); ?>">
                                            <button> Delete </button> 
                                        </form>

                                        <form method="POST" action="<?php echo FRONT_ROOT?>student/ShowEditView">
                                             <input type="hidden" name="firstName" value="<?php echo $student->getFirstName(); ?>"> 
                                             <input type="hidden" name="lastName" value="<?php echo $student->getLastName(); ?>">
                                             <input type="hidden" name="dni" value="<?php echo $student->getDni(); ?>">
                                             <input type="hidden" name="phoneNumber" value="<?php echo $student->getPhoneNumber(); ?>">
                                             <input type="hidden" name="gender" value="<?php echo $student->getGender(); ?>">
                                             <input type="hidden" name="birthDate" value="<?php echo $student->getBirthDate(); ?>">
                                             <input type="hidden" name="studentId" value="<?php echo $student->getStudentId(); ?>">
                                             <input type="hidden" name="carrerId" value="<?php echo $student->getCareerId(); ?>">
                                             <input type="hidden" name="fileNumber" value="<?php echo $student->getFileNumber(); ?>">
                                             <input type="hidden" name="active" value="<?php echo $student->getActive(); ?>">
                                            <button> Edit </button>
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
                                        <h2 class="text-light"> <?php echo "No student results found."; ?> </h2>
                                   </div>
                              </div>
                         <?php
                              }
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>