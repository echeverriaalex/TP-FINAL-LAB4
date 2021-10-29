<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Students List </h2>

                         <ol class="list-group list-group-numbered">
                              <li class="list-group-item">ID</li>
                              <li class="list-group-item">First Name</li>
                              <li class="list-group-item">Last Name </li>
                              <li class="list-group-item">DNI</li>
                              <li class="list-group-item">Phone Number</li>
                         </ol>

                    <tbody>
                         <?php
                              foreach($studentList as $student){
                         ?>
                                   <tr>
                                        <td><?php echo $student->getFileNumber(); ?></td>
                                        <td><?php echo $student->getFirstName(); ?></td>
                                        <td><?php echo $student->getLastName(); ?></td>
                                        <td><?php echo $student->getDni(); ?></td>
                                        <td><?php echo $student->getPhoneNumber(); ?></td>
                                    </tr>
                         <?php
                              }
                         ?>
                         </tr>
                    </tbody>
          </div>
     </section>
</main>