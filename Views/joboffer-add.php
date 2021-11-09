<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Job Offer</h2>
               <form action="<?php echo FRONT_ROOT ?>JobOffer/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <input type="hidden" name="id" value="" class="form-control text-light" autofocus>
                              </div>
                         </div>  
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Company Name</label>
                                   <input type="text" name="companyName" value="" class="form-control text-light" autofocus>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Job Position Id</label>
                                   <input type="text" name="jobPositionId" value="" class="form-control text-light">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Salary</label>
                                   <input type="text" name="salary" value="" class="form-control text-light">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Create job offer</button>
               </form>
          </div>
          
     </section>
</main>