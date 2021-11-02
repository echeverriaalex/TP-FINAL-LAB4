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
            require_once(VIEWS_PATH."select-nav.php");
            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowEditView($name, $address, $phone, $cuit){

            require_once(VIEWS_PATH."company-edit.php");
        }

        public function ShowManageView(){

            $companyList = $this->companyDAO->GetAll();
            require_once(VIEWS_PATH."company-manage.php");
            require_once(VIEWS_PATH."nav-admin.php");
        }

        public function ShowFilterView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."company-filter.php");
        }

        public function Add($name, $address, $cuit, $phone){
            
            $company = new Company($name, $address, $phone, $cuit);
            $this->companyDAO->Add($company);
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
            require_once(VIEWS_PATH."company-manage.php");
        }

        public function Filter ($companyName){


            if($companyName != ""){

                //header("location: ".FRONT_ROOT."HomeController/Index");
                //require_once(VIEWS_PATH."company-manage.php");
                $home = new HomeController();
                $home->Index();
            }


            /*
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