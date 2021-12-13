<div>
    <main class="py-5 profile">
        <section id="listado" class="mb-5">
            <div class="container">
                <div class="list-group">
                    <div class="col-lg-4"> <h2 class=""> 
                    <?php echo $_SESSION['userlogged']->getFirstName()." ".$_SESSION['userlogged']->getLastName();?> </h2></div>
                    <div class="col-lg-4"> 
                        <a class="list-group-item list-group-item-action list-group-item-success"> 
                            Career: 
                            <?php
                                use DAO\CareerPDO;
                                $career = CareerPDO::CheckExistenceCareerApiID($_SESSION['userlogged']->getCareerId());
                                echo $career->getDescription();
                            ?>
                        </a> 
                    </div>                    
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Student ID: <?php echo $_SESSION['userlogged']->getStudentId();?></a> </div>                    
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> DNI: <?php echo $_SESSION['userlogged']->getDni();?></a> </div>                    
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> File number: <?php echo $_SESSION['userlogged']->getFileNumber();?></a> </div>                    
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Gender: <?php echo $_SESSION['userlogged']->getGender();?></a> </div>                    
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Birth date: <?php echo $_SESSION['userlogged']->getBirthDate();?></a> </div>                    
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Email: <?php echo $_SESSION['userlogged']->getEmail();?></a> </div>
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Phone: <?php echo $_SESSION['userlogged']->getPhoneNumber(); ?> </a> </div>
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Status: <?php if($_SESSION['userlogged']->getActive()) echo "Active"; else echo "No active"; ?></a> </div>
                </div>
            </div>
        </section> 
    </main> 
</div>