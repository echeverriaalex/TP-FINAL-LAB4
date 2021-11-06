<?php 
     if(!(isset($_SESSION["email"]))) {
        header("location: " . FRONT_ROOT . "Home/Index");
     }
?>

<div>
    <main class="py-5 profile">
        <section id="listado" class="mb-5">
            <div class="container">
                <div class="list-group">
                    <?php
                        if($company->getName() != null){
                    ?>
                    <div class="col-lg-4">
                        <h2 class="text-light"> <?php echo $company->getName() ?> </h2>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-secondary"> Adress <?php echo $company->getAddress(); ?> </a>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-success"> Phone <?php echo $company->getPhone();?></a>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-danger"> Cuit <?php echo $company->getCuit();?></a>
                    </div>                    
                    <?php
                        }
                        else{
                    ?>
                    <div class="col-lg-4">
                        <h2 class="text-light"> <?php echo "No results found"; ?> </h2>
                    </div>

                    <?php
                        }
                    ?>
                </div>
            </div>
        </section> 
    </main> 
 </div>