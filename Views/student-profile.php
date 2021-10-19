<div>
    <main class="py-5 profile">
        <section id="listado" class="mb-5">
            <div class="container">
                <div class="list-group">

                    <div class="col-lg-4">
                        <h2> <?php echo $student->getFirstName()." ".$student->getLastName(); ?> </h2>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-secondary"> Phone <?php echo $student->getPhoneNumber(); ?> </a>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-success"> DNI <?php echo $student->getDni();?></a>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-danger"> ID <?php echo $student->getStudentId();?></a>
                    </div>
                </div>
            </div>
        </section> 
    </main> 
 </div>