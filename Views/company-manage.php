<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage Companies </h2>

               <div class="container">
                    <a href="<?php  echo FRONT_ROOT?>Company/ShowAddView"> <h2 class="mb-2"> Add a new company </h2> </a>
               </div>              

               <?php
                    if(!empty($companyList)){
               ?>
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