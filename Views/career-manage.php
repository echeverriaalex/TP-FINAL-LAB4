<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage Career </h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>ID</th>
                         <th>Description</th>
                         <th>Active</th>
                         <th>Options</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($careerList as $career){
                         ?>
                                <tr>
                                    <td><?php echo $career->getCareerId(); ?></td>
                                    <td><?php echo $career->getDescription(); ?></td>
                                    <td><?php if($career->getActive()) echo "Active"; else echo "No active";?></td>
                                    <td> 
                                        <form method="POST" action="<?php echo FRONT_ROOT?>Career/Delete">
                                            <input type="hidden" name="careerName" value="<?php echo $career->getCareerId(); ?>">
                                            <button type="submit" class="btn btn-outline-danger"> Delete </button> 
                                        </form>

                                        <form method="POST" action="<?php echo FRONT_ROOT?>Career/ShowEditView">
                                            <input type="hidden" name="id" value="<?php echo $career->getCareerId(); ?>">                                            
                                            <input type="hidden" name="description" value="<?php echo $career->getDescription(); ?>">
                                            <input type="hidden" name="status" value="<?php echo $career->getActive(); ?>">                                       
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