<?php
    namespace Controllers;
    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class CompanyController{

        private $companyDAO;

        public function __construct(){
        
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."company-filter.php");
            $companyList = $this->companyDAO->getAll();
            require_once(VIEWS_PATH."company-list.php");
        }
        
        public function ShowManageView(){

            $companyList = $this->companyDAO->getAll();      
            require_once(VIEWS_PATH.'nav-admin.php');
            $this->ShowFilterView();
            //$companyList = $this->companyDAO->GetAll();
            $companyList = $this->companyPDO->GetAll();
            require_once(VIEWS_PATH."company-manage.php");
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
            $this->companyDAO->Add($company);
            

            echo "<script> alert('La empresa se agrego exitosamente.');</script>";
            $this->ShowAddView();
        }

        public function Edit($currentName, $name, $address, $phone, $cuit){
            
            $companyEdit = new Company($name, $address, $phone, $cuit);
            $this->companyDAO->edit($currentName, $companyEdit);
            $this->ShowManageView();
        }

        public function Delete($companyName){

            $this-> companyDAO->delete($companyName);
            $companyList = $this->companyDAO->getAll();
            $this->ShowManageView();
        }

        public function Filter ($companyName){

            require_once(VIEWS_PATH."select-nav.php");       
            $company = $this->companyDAO->filter($companyName);
            require_once(VIEWS_PATH. "company-info.php");

                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."nav-admin.php");
                require_once(VIEWS_PATH. "company-info.php");

            } else {
                //$this->ShowFilterView();
                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."nav-admin.php");
                require_once(VIEWS_PATH. "company-info.php");
            }            
        }
    }
?>