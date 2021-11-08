<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Students List </h2>
                    <table class="table bg-light-alpha">
                         <thead>
                              <th>ID</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>DNI</th>
                              <th> E-mail </th>
                              <th>Phone Number</th>
                         </thead>
                         <tbody>
                              <?php
                                   foreach($studentList as $student){
                              ?>
                                        <tr>
                                             <td><?php echo $student->getStudentId(); ?></td>
                                             <td><?php echo $student->getFirstName(); ?></td>
                                             <td><?php echo $student->getLastName(); ?></td>
                                             <td><?php echo $student->gettDni(); ?></td>
                                             <td><?php echo $student->getEmail(); ?></td>
                                             <td><?php echo $student->getPhoneNumber(); ?></td>                                          
                                             <td><?php echo $student->getCareerId(); ?> </td>
                                             <td><?php echo $student->setFileNumber(); ?> </td>
                                             <td><?php echo $student->setGender(); ?> </td>
                                             <td><?php echo $student->setBirthDate(); ?> </td>
                                             <td><?php echo $student->setActive(); ?> </td>
                                        </tr>
                              <?php
                                   }
                              ?>
                         </tbody>
                    </table>
          </div>
     </section>
</main>