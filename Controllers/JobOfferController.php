<?php
    namespace Models;

    use PDO/JobOfferPDO;


    class JobOfferController{

        private $jobOfferPDO;

        public function __construct(){$this->jobOfferPDO ;}= new JobOfferPDO();}

        public function ShowAddView(){

            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."jobOffer-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."");
            //$jobOffersList = $this->->GetAll();
            require_once(VIEWS_PATH."");
        }

        public function ShowEditView($name, $address, $phone, $cuit){
            require_once(VIEWS_PATH."jobOffer-edit.php");
        }

        public function ShowManageView(){

            //$companyList = $this->companyDAO->GetAll();    
            $companyList = $this->companyPDO->GetAll();  
            require_once(VIEWS_PATH.'nav-admin.php');
            require_once(VIEWS_PATH."");
        }

        public function ShowFilterView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."");
        }

        public function Add($companyName, $jobPositionId, $salary){
            
            $jobOffer = new JobOffer($companyName, $jobPositionId, $salary);
            $this->jobOfferPDO->Add($jobOffer);
            echo "<script> alert('La oferta de trabajo se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Edit($currentName, $companyName, $jobPositionId, $salary){
            
            $jobOfferEdit = new JobOffer($companyName, $jobPositionId, $salary);
            $this->jobOfferPDO->Edit($currentName, $jobOfferEdit);
            $this->ShowManageView();
        }

        public function Delete($companyName){

            $this-> jobOfferPDO->Delete($companyName);
            $this->ShowManageView();
        }

        public function Filter ($companyName){

            /*
            require_once(VIEWS_PATH."select-nav.php");       
            $company = $this->companyDAO->Filter($companyName);
            require_once(VIEWS_PATH. "company-info.php");

            if($company->getName() != "") {
                require_once(VIEWS_PATH. "company-info.php");
            } else {
                $this->ShowFilterView();
            }
            */
        }
    }
?>