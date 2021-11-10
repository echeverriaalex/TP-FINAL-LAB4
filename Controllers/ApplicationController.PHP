<?php
    namespace Controllers;

    use PDO\ApplicationPDO as ApplicationPDO ;
    use Models\Application as Application;


    class ApplicationController{

        private $applicationPDO;

        public function __construct(){$this->applicationPDO = new ApplicationPDO();}

        public function ShowAddView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."application-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            $jobOffersList = $this->applicationPDO->GetAll();
            require_once(VIEWS_PATH."application-list.php");
        }


        public function ShowManageView(){
  
            $jobOffersList = $this->applicationPDO->GetAll();  
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."application-manage.php");
        }

        public function ShowFilterView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."filter.php");
        }

        public function Add($nameCompany, $jobOfferId, $studentId){
            $application = new Application($nameCompany, $jobOfferId, $studentId);
            $this->applicationPDO->Add($application);
            echo "<script> alert('La postulacion se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Filter ($nameCompany){

            require_once(VIEWS_PATH."select-nav.php");       
            $application = $this->applicationPDO->Filter($nameCompany);

            if($application->getName() != "") {
                require_once(VIEWS_PATH. "company-info.php");
            } else {
                $this->ShowFilterView();
            }
        }
    }
?>