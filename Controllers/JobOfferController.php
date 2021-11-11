<?php
    namespace Controllers;
    use PDO\JobOfferPDO;
    use Models\JobOffer;
    use PDO\CompanyPDO;
    use PDO\JobPositionPDO;

class JobOfferController{

        private $jobOfferPDO;
        private $companyPDO;
        private $jobPositionPDO;

        public function __construct(){
            $this->jobOfferPDO = new JobOfferPDO();
            $this->companyPDO = new CompanyPDO();
            $this->jobPositionPDO = new JobPositionPDO();
        }

        public function ShowAddView(){

            require_once(VIEWS_PATH."nav-admin.php");

            $companyList = $this->companyPDO->GetAll();
            $jobPositionList = $this->jobPositionPDO->GetAll();
            require_once(VIEWS_PATH."jobOffer-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");

            if($_SESSION['userlogged']-> getActive()){

                $jobOfferList = $this->jobOfferPDO->GetAll();

                if(!empty($jobOfferList)){
                    
                    $companyList = $this->companyPDO->GetAll();
                    $jobPositionList = $this->jobPositionPDO->GetAll();

                    if(empty($jobPositionList)){
                        $this->jobPositionPDO->UpdateJobPositionDatabase();
                        $jobPositionList = $this->jobPositionPDO->GetAll();
                    }
                }
                require_once(VIEWS_PATH."jobOffer-list.php");
            }
            else{

                echo "No estas activo no podes postularte. Decile a la utn que te active.";
            }
        }

        public function ShowEditView($id, $salary, $companyId, $jobPositionId){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."jobOffer-edit.php");
        }

        public function ShowManageView(){
            
            require_once(VIEWS_PATH.'select-nav.php');

            $jobOfferList = $this->jobOfferPDO->GetAll();

            if(!empty($jobOfferList)){
                
                $companyList = $this->companyPDO->GetAll();
                $jobPositionList = $this->jobPositionPDO->GetAll();

                if(empty($jobPositionList)){
                    $this->jobPositionPDO->UpdateJobPositionDatabase();
                    $jobPositionList = $this->jobPositionPDO->GetAll();
                }
            }
            require_once(VIEWS_PATH."jobOffer-manage.php");
            //$jobOfferList = $this->jobOfferPDO->GetAll();
        }

        public function ShowFilterView(){

            $nameFilter = "Job offer Filter";
            $infoFilter = "You can filter by jof offer name!";
            $controllerMethod = "JobOffer/Filter";
            $nameParameter = "jobOfferName";
            require_once(VIEWS_PATH."filter.php");
        }

        public function Add($company, $jobPosition, $salary){
            
            $jobOffer = new JobOffer();
            $jobOffer->setNameCompany($company);
            $jobOffer->setJobPositionId($jobPosition);
            $jobOffer->setSalary($salary);
            $this->jobOfferPDO->Add($jobOffer);
            echo "<script> alert('La oferta de trabajo se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Edit($currentId, $company, $jobPosition, $salary){
            
            $jobOfferEdit = new JobOffer($company, $jobPosition, $salary);
            $this->jobOfferPDO->Edit($currentId, $jobOfferEdit);
            $this->ShowManageView();
        }

        public function Delete($id){

            $this->jobOfferPDO->Delete($id);
            $this->ShowManageView();
        }

        public function Filter ($id){

            require_once(VIEWS_PATH."select-nav.php");       
            $jobOffer = $this->jobOfferPDO->Filter($id);
 
            // revisar
            if($jobOffer != "") {
                require_once(VIEWS_PATH. "company-info.php");
            } else {
                $this->ShowFilterView();
            }
        }
    }
?>