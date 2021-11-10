<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4"> Manage Administrator </h2>

               <div class="container">
                    <a href="<?php  echo FRONT_ROOT?>Administrator/ShowAddView"> <h2 class="mb-2"> Add a new administrator </h2> </a>
               </div>              

               <?php
                    if(!empty($administratorList)){
               ?>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>E-mail</th>
                         <th>Password</th>
                         <th>Rol</th>
                         <th>Options</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($administratorList as $administrator){
                         ?>
                                <tr>
                                    <td><?php echo $administrator->getEmail(); ?></td>
                                    <td><?php echo $administrator->getPassword(); ?></td>
                                    <td><?php echo $administrator->getRole(); ?></td>
                                    <td> 
                                        <form method="POST" action="<?php echo FRONT_ROOT?>Administrator/Delete">
                                            <input type="hidden" name="administratorEmail" value="<?php echo $administrator->getEmail(); ?>">
                                            <button type="submit" class="btn btn-outline-danger"> Delete </button> 
                                        </form>
                                        <br>
                                        <form method="POST" action="<?php echo FRONT_ROOT?>Administrator/ShowEditView">
                                            <input type="hidden" name="email" value="<?php echo $administrator->getEmail(); ?>">                                            
                                            <input type="hidden" name="password" value="<?php echo $administrator->getPassword(); ?>">                                     
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