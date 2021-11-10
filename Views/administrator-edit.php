<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Edit administrator</h2>
               <form action="<?php echo FRONT_ROOT ?>Administrator/Edit" method="post" class="bg-light-alpha p-5">
                    <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <input type="hidden" name="currentEmail" value="<?php echo $email; ?>">
                                   <label for="">E-mail</label>
                                   <input type="text" name="email" value="<?php echo $email; ?>" class="form-control text-light">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Password</label>
                                   <input type="text" name="password" value="<?php echo $password; ?>" class="form-control text-light">
                              </div>
                         </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Save changes</button>
               </form>
          </div>
     </section>
</main>