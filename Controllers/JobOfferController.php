<?php
    namespace Controllers;

    use PDO\JobOfferPDO as JobOfferPDO;
    use Models\JobOffer as JobOffer;


    class JobOfferController{

        private $jobOfferPDO;

        public function __construct(){$this->jobOfferPDO = new JobOfferPDO();}

        public function ShowAddView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."jobOffer-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            $jobOffersList = $this->jobOfferPDO->GetAll();
            require_once(VIEWS_PATH."jobOffer-list.php");
        }

        public function ShowEditView($name, $address, $phone, $cuit){
            require_once(VIEWS_PATH."jobOffer-edit.php");
        }

        public function ShowManageView(){
  
            $jobOffersList = $this->jobOfferPDO->GetAll();  
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."jobOffer-manage.php");
        }

        public function ShowFilterView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."filter.php");
        }

        public function Add($id, $companyName, $jobPositionId, $salary){
            $jobOffer = new JobOffer($id, $companyName, $jobPositionId, $salary);
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

            require_once(VIEWS_PATH."select-nav.php");       
            $company = $this->jobOfferPDO->Filter($companyName);

            if($company->getName() != "") {
                require_once(VIEWS_PATH. "company-info.php");
            } else {
                $this->ShowFilterView();
            }
        }
    }
?>