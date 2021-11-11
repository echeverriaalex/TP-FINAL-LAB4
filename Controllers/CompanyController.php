<?php
    namespace Controllers;
    use DAO\CompanyDAO;
    use PDO\CompanyPDO;
    use Models\Company;
    use PDO\SessionCheck;

    class CompanyController{

        private $companyDAO;
        private $companyPDO;

        public function __construct(){
        
            $this->companyDAO = new CompanyDAO();
            $this->companyPDO = new CompanyPDO();
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check())
                require_once(VIEWS_PATH."company-add.php");
            else
                HomeController::Index();
        }

        public function ShowListView(){
            require(VIEWS_PATH."select-nav.php");
            //$companyList = $this->companyDAO->GetAll();
            
            if(SessionCheck::Check()){
                $this->ShowFilterView();           
                $companyList = $this->companyPDO->GetAll();
                require_once(VIEWS_PATH."company-list.php");
            }
            else
                HomeController::Index();
        }
        
        public function ShowManageView(){
            
            require_once(VIEWS_PATH.'select-nav.php');
            //$companyList = $this->companyDAO->GetAll();

            if(SessionCheck::Check()){
                $this->ShowFilterView();
                $companyList = $this->companyPDO->GetAll();
                require_once(VIEWS_PATH."company-manage.php");
            }
            else
                HomeController::Index();
        }

        public function ShowEditView($name, $address, $phone, $cuit){
            require_once(VIEWS_PATH."company-edit.php");
        }

        public function ShowFilterView(){

            $nameFilter = "Company Filter";
            $infoFilter = "You can filter by company name!";
            $controllerMethod = "Company/Filter";
            $nameParameter = "companyName";
            require_once(VIEWS_PATH."filter.php");
        }

        public function Add($name, $address, $cuit, $phone){
            
            $company = new Company($name, $address, $phone, $cuit);
            $this->companyPDO->Add($company);
            //echo "<script> alert('La empresa se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Edit($currentName, $name, $address, $phone, $cuit){
            
            $companyEdit = new Company($name, $address, $phone, $cuit);
            $this->companyPDO->Edit($currentName, $companyEdit);
            $this->ShowManageView();
        }

        public function Delete($companyName){

            $this->companyPDO->Delete($companyName);
            $this->ShowManageView();
        }

        public function Filter ($companyName){

            require_once(VIEWS_PATH."select-nav.php");       
            $company = $this->companyPDO->Filter($companyName);
            
            if($company != null && $company->getName() != "") {
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "company-info.php");

            } else {
                $this->ShowFilterView();
            }            
        }
    }
?>