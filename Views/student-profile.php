<div>
    <main class="py-5 profile">
        <section id="listado" class="mb-5">
            <div class="container">
                <div class="list-group">
                    <div class="col-lg-4"> 
                        <h2 class="text-light"> <?php echo $student->getFirstName()." ".$student->getLastName();?> </h2>
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-danger"> ID <?php echo $student->getStudentId();?></a> 
                    </div>  

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> Career ID <?php echo $student->getCareerId();?></a> 
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> DNI <?php echo $student->getDni();?></a> 
                        /div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> File number <?php echo $student->getFileNumber();?></a> 
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> Gender <?php echo $student->getGender();?></a> 
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> Birth date <?php echo $student->getBirthDate();?></a> 
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> Email <?php echo $student->getEmail();?></a> 
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-secondary"> Phone <?php echo $student->getPhoneNumber(); ?> </a> 
                    </div>

                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> Status <?php if($student->getActive()) echo "Active"; else echo "No active"; ?></a> 
                    </div>
                    
                </div>
            </div>
        </section> 
    </main> 
 </div>