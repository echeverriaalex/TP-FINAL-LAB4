<?php
    namespace Controllers;
    use DAO\CareerDAO;
    use Models\Career;
    use PDO\CareerPDO;
    use PDO\SessionCheck;

    class CareerController{

        private $careerDAO;
        private $careerPDO;

        public function __construct(){
            
            $this->careerDAO = new CareerDAO();
            $this->careerPDO = new CareerPDO();
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check())
                require_once(VIEWS_PATH."career-add.php");
            else
                HomeController::Index();
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");

            if(SessionCheck::Check()){
                $this->ShowFilterView();
                //$careerList = $this->careerDAO->GetAll();
                $careerList = $this->careerPDO->GetAll();
                var_dump($careers);
                //require_once(VIEWS_PATH."career-list.php");
            }
            else
                HomeController::Index();            
        }
        
        public function ShowManageView(){

            //$companyList = $this->companyDAO->GetAll();  
            require_once(VIEWS_PATH.'select-nav.php');
            $this->ShowFilterView();
            $careerList = $this->careerPDO->GetAll();
            require_once(VIEWS_PATH."career-manage.php");
        }

        public function ShowFilterView(){

            $nameFilter = "Career Filter";
            $infoFilter = "You can filter by career name!";
            $controllerMethod = "Career/Filter";
            $nameParameter = "careerName";
            require_once(VIEWS_PATH."filter.php");
        }

        public function Filter($careerName){

            require_once(VIEWS_PATH."select-nav.php");       
            //$career = $this->careerDAO->Filter($careerName);
            $career = $this->careerPDO->Filter($careerName);
            //require_once(VIEWS_PATH. "career-info.php");
            
            if($career != null && $career->getDescription() != "") {

                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "career-info.php");

            } else {
                //$this->ShowFilterView();
                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "career-info.php");
            }            
        }

        public function Delete($careerName){

            //$this-> companyDAO->Delete($careerName);
            $this->careerPDO->Delete($careerName);
            $this->ShowManageView();
        }

        public function Update(){

            $this->careerPDO->UpdateCareerDatabase();
            echo "<br> Base de datos actualizada con API <br>";
            $this->ShowManageView();
        }

        public function Add($careerId, $description, $active){

            $career = new Career($careerId, $description, $active);
            //$this->careerDAO->Add($career);
            $this->careerPDO->Add($career);
            $this->ShowAddView();
        }
    }
?>