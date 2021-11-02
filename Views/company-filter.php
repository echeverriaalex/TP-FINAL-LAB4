<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Filter company</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/Filter" method="post" class="bg-light-alpha p-5">
                    <div class="row">  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="companyName" class="form-control text-light" autofocus>
                              </div>
                         </div> 
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Search</button>
               </form>
          </div>
     </section>
</main>