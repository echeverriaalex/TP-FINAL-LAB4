<?php
    require_once('nav-admin.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Delete Companies </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Ciut</th>
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
                                        <form method="POST" action="<?php echo FRONT_ROOT?>/Company/Delete">
                                            <input type="hidden" name="companyName" value="<?php echo $company->getName(); ?>">
                                            <button> Delete </button> 
                                        </form>

                                        <form>
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