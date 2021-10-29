<?php
    namespace Controllers;
    use DAO\CompanyDAO;
    use Models\Company;

    class CompanyController{

        private $companyDAO;

        public function __construct(){$this->companyDAO = new CompanyDAO();}

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."nav-admin.php");
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowEditView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."company-edit.php");
        }

        public function Add($name, $address, $phone, $cuit){

            $company = new Company($name, $address, $phone, $cuit);
            $this->companyDAO->Add($company);
            $this->ShowAddView();
        }
    }
?>