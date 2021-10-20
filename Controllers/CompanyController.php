<?php
    namespace Controllers;
    use DAO\CompanyDAO;
    use Models\Company;

    class CompanyController{

        private $companyDAO;

        public function __construct(){$this->companyDAO = new CompanyDAO();}

        public function ShowAddView(){
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView(){
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-list.php");
        }

        public function EditCompany(){
            require_once(VIEWS_PATH."company-edit.php");
        }

        public function ShowDeleteView(){

            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-delete.php");
        }

        public function Add($name, $address, $cuit, $phone){
            
            $company = new Company($name, $address, $phone, $cuit);
            $this->companyDAO->Add($company);
            $this->ShowAddView();
        }

        public function Delete($companyName){

            $this-> companyDAO->Delete($companyName);
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-delete.php");
        }
    }
?>