<main class="">
     <section id="listado" class="">
          <div class="container">
               <h2 class=""> <?php echo $nameFilter; ?> </h2>
               <form action="<?php echo FRONT_ROOT ?> <?php echo $controllerMethod; ?>" method="post" class="bg-light-alpha">
                    <div class="row">  
                         <div class="">
                              <div class="form-group">
                                   <input type="text" name="<?php echo $nameParameter;?>" class="form-control text-light" placeholder="<?php echo $infoFilter; ?>" autofocus required>
                              </div>
                         </div> 
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Search</button>
               </form>
          </div>
     </section>
</main>