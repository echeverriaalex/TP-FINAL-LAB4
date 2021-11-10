<?php
    namespace Controllers;
    use Models\User;
    use PDO\AdministratorPDO;
    use PDO\SessionCheck;
    use PDO\UserPDO;

    class AdministratorController{

        private $administratorPDO;

        public function __construct(){
            
            $this->administratorPDO = new AdministratorPDO();
        }

        public function ShowAddView(){

            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check())
                require_once(VIEWS_PATH."administrator-add.php");
            else
                HomeController::Index();
        }

        public function ShowEditView($email, $password){

            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check())
                require_once(VIEWS_PATH."administrator-edit.php");
            else
                HomeController::Index();
        }
        
        public function ShowManageView(){

            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check()){
                $administratorList = $this->administratorPDO->GetAll();
                require_once(VIEWS_PATH."administrator-manage.php");
            }
            else
                HomeController::Index();
        }

        public function ShowFilterView(){

            $nameFilter = "Company Filter";
            $infoFilter = "You can filter by company name!";
            $controllerMethod = "Company/Filter";
            $nameParameter = "companyName";
            require_once(VIEWS_PATH."filter.php");
        }

        public function Filter ($companyName){

            require_once(VIEWS_PATH."select-nav.php");       
            //$company = $this->companyDAO->Filter($companyName);
            $company = $this->companyPDO->Filter($companyName);
            //require_once(VIEWS_PATH. "company-info.php");
            
            if($company != null && $company->getName() != "") {

                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "company-info.php");

            } else {
                //$this->ShowFilterView();
                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "company-info.php");
            }            
        }

        public function Add($email, $password){

            $admin = new User($email, $password, "admin");
            $this->administratorPDO->Add($admin);
            $this->ShowAddView();
        }

        public function Delete($administratorEmail){

            $this->administratorPDO->Delete($administratorEmail);
            $this->ShowManageView();
        }

        public function Edit($currentEmail, $email, $password){
            
            $user = new User($email, $password);
            //$this->companyDAO->Edit($currentName, $companyEdit);
            $this->administratorPDO->Edit($currentEmail, $user);
            $this->ShowManageView();
        }
    }
?>