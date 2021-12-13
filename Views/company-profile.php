<div>
    <main class="py-5 profile">
        <section id="listado" class="mb-5">
            <div class="container">
                <div class="list-group">
                    <div class="col-lg-4"> <h2 class=""> <?php echo $_SESSION['userlogged']->getName();?> </h2></div>
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Address: <?php echo $_SESSION['userlogged']->getAddress();?></a> </div>
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Phone Number: <?php echo $_SESSION['userlogged']->getPhone();?></a> </div>
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> Cuit: <?php echo $_SESSION['userlogged']->getCuit();?></a> </div>
                    <div class="col-lg-4"> <a class="list-group-item list-group-item-action list-group-item-success"> E-mail: <?php echo $_SESSION['userlogged']->getEmail();?></a> </div>
                </div>
            </div>
        </section> 
    </main> 
 </div>