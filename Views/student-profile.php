<?php
    use DAO\StudentDAO;

    $StudentDAO = new StudentDAO();
    $students = $StudentDAO->GetAll();

?>

<div>

    <?php
        foreach($students as $student){
    ?>      
    <main class="py-5">
        <section id="listado" class="mb-5">
            <div class="container">
    
                <div class="col-lg-4">
                    <h2> <?php echo $student->getFirstName()." ".$student->getLastName(); ?> </h2>
                    
                </div>

                <div class="col-lg-4">
                    <a> Phone Number  <?php echo $student->getPhoneNumber(); ?> </a>
                </div>

                <div class="col-lg-4">
                    <a> DNI <?php echo $student->getDni();?></a>
                </div>

                <div class="col-lg-4">
                    <a> ID <?php echo $student->getStudentId();?></a>
                </div>
            </div>
        </section>    
    </main>

    <?php
        }
    ?>
</div>