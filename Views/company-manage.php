<?php 
    /* if(isset($_SESSION["email"])) {
          if($_SESSION["role"] != "admin") {
               header("location: " . FRONT_ROOT . "User/ShowUserHome");
          }
     } else {
          header("location: " . FRONT_ROOT . "Home/Index");
     }

     */
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage Companies </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Cuit</th>
                         <th>Name</th>
                         <th>Address</th>
                         <th>Phone</th>
                         <th>Options</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($companyList as $company){
                         ?>
                                <tr>
                                    <td><?php echo $company->getCuit(); ?></td>
                                    <td><?php echo $company->getName(); ?></td>
                                    <td><?php echo $company->getAddress(); ?></td>
                                    <td><?php echo $company->getPhone(); ?></td>
                                    <td> 
                                        <form method="POST" action="<?php echo FRONT_ROOT?>Company/Delete">
                                            <input type="hidden" name="companyName" value="<?php echo $company->getName(); ?>">
                                            <button type="submit" class="btn btn-outline-danger"> Delete </button> 
                                        </form>
                                        <br>
                                        <form method="POST" action="<?php echo FRONT_ROOT?>Company/ShowEditView">
                                            <input type="hidden" name="name" value="<?php echo $company->getName(); ?>">                                            
                                            <input type="hidden" name="address" value="<?php echo $company->getAddress(); ?>">
                                            <input type="hidden" name="phone" value="<?php echo $company->getPhone(); ?>">
                                            <input type="hidden" name="cuit" value="<?php echo $company->getCuit(); ?>">                                            
                                            <button type="submit" class="btn btn-outline-primary"> Edit </button>
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