<?php
    namespace Controllers;
    use DAO\ApplicationPDO as ApplicationPDO ;
    use Models\Application as Application;
    use DAO\CompanyPDO;
    use DAO\JobOfferPDO;
    use DAO\JobPositionPDO;
    use DAO\StudentPDO;
    use Models\JobPosition;

    class ApplicationController{

        private $applicationPDO;
        private $jobOfferPDO;
        private $studentPDO;
        private $companyPDO;

        public function __construct(){
            $this->applicationPDO = new ApplicationPDO();
            $this->jobOfferPDO = new JobOfferPDO();
            $this->studentPDO = new StudentPDO();
            $this->companyPDO = new CompanyPDO();
        }

        public function ShowAddView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."application-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");

            //$jobOffersList = $this->applicationPDO->GetAll();
            $jobOffersList = $this->jobOfferPDO->GetAll();
            require_once(VIEWS_PATH."jobOffer-list.php");
        }

        public function ShowMyApplicationList(){
            require_once(VIEWS_PATH."select-nav.php");            
            $companyPDO = new CompanyPDO();
            $companyList = $companyPDO->GetAll();
            $jobOfferPDO = new JobOfferPDO();
            $jobOffersList =$jobOfferPDO->GetAll();
            $studentPDO = new StudentPDO();
            $studentList = $studentPDO->GetAll();
            $jobPositionPDO = new JobPositionPDO();
            $jobPositionList = $jobPositionPDO->GetAll();
            $applicationPDO = new ApplicationPDO();
            $applicationList = $applicationPDO->GetAllApplications();
            require_once(VIEWS_PATH."student-applications-list.php");
        }

        public function ShowManageView(){
            require_once(VIEWS_PATH."select-nav.php");
            $companyPDO = new CompanyPDO();
            $companyList = $companyPDO->GetAll();

            $jobOfferPDO = new JobOfferPDO();
            $jobOffersList =$jobOfferPDO->GetAll();

            $studentPDO = new StudentPDO();
            $studentList = $studentPDO->GetAll();

            //$jobPositionPDO = new JobPositionPDO();
            //$jobPositionList = JobPositionPDO::getJobPositionListApi();

            $applicationPDO = new ApplicationPDO();
            $applicationList = $applicationPDO->GetAllApplications();

            require_once(VIEWS_PATH."application-manage.php");
        }

        public function Add($jobOfferId, $studentId){
            $application = new Application($jobOfferId, $studentId);
            $this->applicationPDO->Add($application);
            //echo "<script> alert('La postulacion se agrego exitosamente.');</script>";
            $this->ShowMyApplicationList();
            //echo "se te agrego en la bd";
        }

        public function Delete($id, $emailStudent){

            $this->applicationPDO->Delete($id);
            echo "<script> alert('Application deleted successfully.');</script>";

            if($_SESSION['userlogged']->getRole() == "admin"){

                $to = $emailStudent;
                $subject = 'Linkedon notice';
                $message   = 'The linkedon administrator rejected your application';
                $from = 'From: linkedon.staff@gmail.com';

                if (mail($to, $subject, $message, $from)) {
                    echo "<script> alert('The user was notified by email.');</script>";
                }
            }
            $this->ShowMyApplicationList();
        }

        public function Filter ($nameCompany){

            require_once(VIEWS_PATH."select-nav.php");       
            $application = $this->applicationPDO->Filter($nameCompany);

            if( $application!= "") {
                require_once(VIEWS_PATH. "company-info.php");
            } else {
                //$this->ShowFilterView();
            }
        }

        public function ShowApplicantsList($id){
            require_once(VIEWS_PATH."select-nav.php");

            $applicationList = $this->applicationPDO->SearchApplication($id);
            $jobOfferList = $this->jobOfferPDO->GetAll();
            $companyList = $this->companyPDO->GetAll();
            $studentList = $this->studentPDO->GetAll();

            require_once(VIEWS_PATH."application-manage.php");

        }    
    }
?>