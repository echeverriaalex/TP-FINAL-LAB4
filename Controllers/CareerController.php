<?php
    namespace Controllers;
    use DAO\CareerDAO;
    use Models\Career;

    class CareerController{

        private $careerDAO;

        public function __construct(){$this->coreerDAO = new CareerDAO();}

        public function ShowAddView(){
            require_once(VIEWS_PATH."career-add.php");
        }

        public function ShowListView(){

            $careerList = $this->careerDAO->GetAll();
            require_once(VIEWS_PATH."career-list.php");
        }

        public function Add($careerId, $description, $active){

            $career = new Career($careerId, $description, $active);
            $this->studentDAO->Add($career);
            $this->ShowAddView();
        }
    }
?>