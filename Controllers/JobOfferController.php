<?php
    namespace Controllers;
    use DAO\ApplicationPDO;
    use DAO\CareerPDO;
    use DAO\JobOfferPDO;
    use Models\JobOffer;
    use DAO\CompanyPDO;
    use DAO\JobPositionPDO;
use DAO\StudentPDO;
use Models\JobPosition;
    use PDOException;

    class JobOfferController{

        private $jobOfferPDO;
        private $companyPDO;
        private $jobPositionPDO;
        private $applicationPDO;

        public function __construct(){
            $this->jobOfferPDO = new JobOfferPDO();
            $this->companyPDO = new CompanyPDO();
            $this->jobPositionPDO = new JobPositionPDO();
            $this->applicationPDO = new ApplicationPDO();
        }

        public function ShowAddView(){

            require_once(VIEWS_PATH."select-nav.php");
            //$jobPositionList = $this->jobPositionPDO->GetAll();
            $companyList = $this->companyPDO->GetAll();            
            $jobPositionList = JobPositionPDO::getJobPositionListApi();
            require_once(VIEWS_PATH."jobOffer-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            if($_SESSION['userlogged']-> getActive()){
                $jobOfferList = $this->jobOfferPDO->GetAll();
                $this->ShowFilterView();

                self::CheckCulminationOffers($jobOfferList);

                if(!empty($jobOfferList)){                    
                    $companyList = $this->companyPDO->GetAll();
                    $jobPositionList = JobPositionPDO::getJobPositionListApi(); //$this->jobPositionPDO->GetAll();

                    if(empty($jobPositionList)){
                        //$this->jobPositionPDO->UpdateJobPositionDatabase();
                        $jobPositionList = $this->jobPositionPDO->GetAll();
                    }
                }
                require_once(VIEWS_PATH."jobOffer-list.php");
            }
            else{
                echo "No estas activo no podes postularte. Decile a la utn que te active.";
            }
        }

        public function ShowEditView($id, $salary, $companyId, $jobPositionId, $photo){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."jobOffer-edit.php");
        }

        public function ShowManageView(){            
            require_once(VIEWS_PATH.'select-nav.php');
            $jobOfferList = $this->jobOfferPDO->GetAll();
            self::CheckCulminationOffers($jobOfferList);
            if(!empty($jobOfferList)){  
                $this->ShowFilterView();              
                $companyList = $this->companyPDO->GetAll();
                $careerList = CareerPDO::getCareerListApi();
                //$jobPositionList = $this->jobPositionPDO->GetAll();
                $jobPositionList = JobPositionPDO::getJobPositionListApi();
            }            
            require_once(VIEWS_PATH."jobOffer-manage.php");
        }

        public function ShowFilterView(){

            $nameFilter = "Job offer Filter";
            $infoFilter = "You can filter by jof offer name!";
            $controllerMethod = "JobOffer/Filter";
            $nameParameter = "dataJobOffer";
            require_once(VIEWS_PATH."filter.php");
        }

        public function Add($company, $jobPosition, $salary, $photo, $createDate, $culmination){
            
            $jobOffer = new JobOffer($company, $salary, $jobPosition, $photo,$createDate, $culmination);
            //var_dump($jobOffer);

            
            try{
                $this->jobOfferPDO->Add($jobOffer);
                echo "<script> alert('La oferta de trabajo se agrego exitosamente.');</script>";
                $this->ShowAddView();
            }catch(PDOException $exStudentPDO){

                echo "<script>alert('".$exStudentPDO->getMessage();"');</script>";
                $this->ShowAddView();
            }
        }

        public function Edit($currentId, $company, $jobPosition, $salary, $photo){
            
            $jobOfferEdit = new JobOffer($company, $salary, $jobPosition, $photo, $currentId);
            $this->jobOfferPDO->Edit($currentId, $jobOfferEdit);
            $this->ShowManageView();
        }

        public function Delete($id){

            $this->jobOfferPDO->Delete($id);
            $this->ShowManageView();
        }

        public function Filter ($dataJobOffer){

            require_once(VIEWS_PATH."select-nav.php");
            $this->ShowFilterView();
            $jobPositionList = JobPositionPDO::getJobPositionListApi();
            $careerList = CareerPDO::getCareerListApi();

            foreach($jobPositionList as $jobPosition){
                if($dataJobOffer == $jobPosition->getDescription()){
                    $dataJobOffer = $jobPosition->getId();
                }
            }

            $jobOfferList = $this->jobOfferPDO->Filter($dataJobOffer);
            $companyList = $this->companyPDO->GetAll();

            switch($_SESSION['userlogged']->getRole()){

                case "admin": require_once(VIEWS_PATH."jobOffer-manage.php"); break;
                case "company": require_once(VIEWS_PATH."jobOffer-manage.php"); break;
                case "student": require_once(VIEWS_PATH."jobOffer-list.php"); break;
            }

            /*
            if(!empty($jobOfferSearch)){
                foreach($jobOfferSearch as $jobOffer){
                    foreach($jobPositionList as $jobPosition){
                        if($jobOffer->getJobPositionId() == $jobPosition->getId()){
                            echo $jobPosition->getDescription();
                        }
                    }
                }
            }
            
            if($jobOffer != null && $jobOffer->getJobPositionId() != "") {
                //require_once(VIEWS_PATH. "company-info.php");
                echo $jobOffer;
            } else {
                $this->ShowFilterView();
            }
            */
        }

        public function ListApplications($id){

            $jobPositionList = JobPositionPDO::getJobPositionListApi();

            foreach($jobPositionList as $jobPosition){

                if($jobPosition->getId() == $id){
                    
                    $applications = $this->applicationPDO->SearchApplication($id);
                }
            }
        }

        public static function CheckCulminationOffers($jobOfferList){

            if(!empty($jobOfferList)){
                date_default_timezone_set('America/Argentina/Buenos_Aires');
                $applicationPDO = new ApplicationPDO();
                $applicationsList = $applicationPDO->GetAllApplications();
                $studentPDO = new StudentPDO();
                $jobOfferController = new JobOfferController();
                $studentList = $studentPDO->GetAll();
                $currentTime = date("c");

                foreach($jobOfferList as $jobOffer){
                    if($currentTime >= $jobOffer->getCulmination()){
                        foreach($applicationsList as $application){
                            if($application->getJobOfferId() == $jobOffer->getId()){                                
                                foreach($studentList as $student){
                                    if($application->getStudentId() == $student->getStudentId()){
                                    
                                        $to = $student->getEmail();
                                        $subject = 'Linkedon notice';
                                        $message   = 'Hello '.$student->getFirstName().', we would like to inform you that the job offer
                                        you applied for has expired. Thank you very much for using our service!';
                                        $from = 'From: linkedon.staff@gmail.com';
                        
                                        if (mail($to, $subject, $message, $from)) {
                                            $adminmessage = "<script> alert('The user was notified by email that the application expired.');</script>";
                                            $jobOfferController->Delete($jobOffer->getId());
                                            $applicationPDO->Delete($application->getId());
                                            echo "<script> alert('A joboffer expired and was removed.');</script>";

                                            if($_SESSION['userlogged']->getRole() == "admin"){

                                                echo $adminmessage;
                                            }
                                        }
                                    }
                                }
                            }
                        }                    
                    }
                }
            }
        }

        public function GeneratePDF($id){

            //require_once(ROOT."fpdf.php");

            echo "estoy en generator pdf";

        }
    }
?>