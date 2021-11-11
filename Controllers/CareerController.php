<?php
    namespace Controllers;
    use Models\Career as Career;
    use PDO\CareerPDO as CareerPDO;
    use PDO\SessionCheck as SessionCheck;

    class CareerController{

        private $careerPDO;

        public function __construct(){
            
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
                $careerList = $this->careerPDO->GetAll();
                require_once(VIEWS_PATH."career-list.php");
            }
            else
                HomeController::Index();            
        }
        
        public function ShowManageView(){

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
            $career = $this->careerPDO->Filter($careerName);
            
            if($career != null && $career->getDescription() != "") {
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "career-info.php");

            } else {
                $this->ShowFilterView();
            }            
        }

        public function Delete($careerID){

            //$this-> companyDAO->Delete($careerName);
            $this->careerPDO->Delete($careerID);
            $this->ShowManageView();
        }

        public function Update(){

            $this->careerPDO->UpdateCareerDatabase();
            echo "<br> Base de datos actualizada con API <br>";
            $this->ShowManageView();
        }

        public function Add($careerId, $description, $active){

            $career = new Career($careerId, $description, $active);
            $this->careerPDO->Add($career);
            $this->ShowAddView();
        }
    }
?>