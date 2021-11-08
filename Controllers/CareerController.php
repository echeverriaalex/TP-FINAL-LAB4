<?php
    namespace Controllers;
    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career;

    class CareerController{

        private $careerDAO;
        private $careerPDO;

        public function __construct(){
            
            $this->careerDAO = new CareerDAO();
            $this->careerPDO = new CareerPDO();
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."career-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."nav-admin.php");
            $this->ShowFilterView();
            //$careerList = $this->careerDAO->GetAll();
            $careerList = $this->careerPDO->GetAll();
            var_dump($careers);
            //require_once(VIEWS_PATH."career-list.php");
        }
        
        public function ShowManageView(){

            //$companyList = $this->companyDAO->GetAll();  
            require_once(VIEWS_PATH.'nav-admin.php');
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
                require_once(VIEWS_PATH."nav-admin.php");
                require_once(VIEWS_PATH. "career-info.php");

            } else {
                //$this->ShowFilterView();
                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."nav-admin.php");
                require_once(VIEWS_PATH. "career-info.php");
            }            
        }

        public function Update(){

            $careerList = $this->careerDAO->getAll();
            require_once(VIEWS_PATH."career-list.php");
        }

        public function Add($careerId, $description, $active){

            $career = new Career($careerId, $description, $active);
            $this->studentDAO->add($career);
            $this->ShowAddView();
        }
    }
?>