<div>
    <main class="py-5 profile">
        <section id="listado" class="mb-5">
            <div class="container">
                <div class="list-group">
                    <?php
                        if($career != null && $career->getDescription() != null){
                    ?>
                    <div class="col-lg-4">
                        <h2 class="text-light"> <?php echo $career->getDescription() ?> </h2>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-secondary"> ID <?php echo $career->getCareerId(); ?> </a>
                    </div>

                    <div class="col-lg-4">
                        <a class="list-group-item list-group-item-action list-group-item-success"> Status <?php if($career->getActive()) echo "Active"; else echo "No active";?></a>
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