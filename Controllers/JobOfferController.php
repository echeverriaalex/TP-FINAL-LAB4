<?php
    namespace Models;

    class JobOfferController{

        private $jobOffersPDO;

        public function __construct(){$this->jobOffersPDO ;}// = new CompanyPDO();}

        public function ShowAddView(){

            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."joboffer-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."");
            //$jobOffersList = $this->->GetAll();
            require_once(VIEWS_PATH."");
        }

        public function ShowEditView($name, $address, $phone, $cuit){
            require_once(VIEWS_PATH."");
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

        public function Add($name, $address, $cuit, $phone){
            
            $jobOffer = new Company($name, $address, $phone, $cuit);
            //$this->companyDAO->Add($company);
            //$this->->Add($company);
            echo "<script> alert('La oferta de trabajo se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Edit($currentName, $name, $address, $phone, $cuit){
            
            $companyEdit = new Company($name, $address, $phone, $cuit);
            //$this->companyDAO->Edit($currentName, $companyEdit);
            //$this->->Edit($currentName, $companyEdit);
            $this->ShowManageView();
        }

        public function Delete($jobOfferName){

            //$this-> companyDAO->Delete($companyName);
            //$this->->Delete($jobOfferName);
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