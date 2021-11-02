<?php
    namespace Controllers;
    use DAO\CompanyDAO;
    use PDO\CompanyPDO;
    use Models\Company;

    class CompanyController{

        private $companyDAO;
        private $companyPDO;

        public function __construct(){
        
            $this->companyDAO = new CompanyDAO();
            $this->companyPDO = new CompanyPDO();
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."company-filter.php");
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowEditView($name, $address, $phone, $cuit){

            require_once(VIEWS_PATH."company-edit.php");
        }

        public function ShowManageView(){

            $companyList = $this->companyDAO->GetAll();      
            require_once(VIEWS_PATH.'nav-admin.php');
            require_once(VIEWS_PATH."company-manage.php");
        }

        public function Add($name, $address, $cuit, $phone){
            
            $company = new Company($name, $address, $phone, $cuit);
            //$this->companyDAO->Add($company);
            $this->companyPDO->Add($company);
            

            echo "<script> alert('La empresa se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Edit($currentName, $name, $address, $phone, $cuit){
            
            $companyEdit = new Company($name, $address, $phone, $cuit);
            $this->companyDAO->Edit($currentName, $companyEdit);
            $this->ShowManageView();
        }

        public function Delete($companyName){

            $this-> companyDAO->Delete($companyName);
            $companyList = $this->companyDAO->GetAll();
            $this->ShowManageView();
        }

        public function Filter ($companyName){

            require_once(VIEWS_PATH."select-nav.php");
            $company = $this->companyDAO->Filter($companyName);
            require_once(VIEWS_PATH. "company-info.php");
        }
    }
?>