<?php
    namespace Controllers;    

    class HomeController{
        public function Index(){
            
            require_once(VIEWS_PATH."nav.php");
           // require_once(VIEWS_PATH."nav-admin.php");
            require(VIEWS_PATH."home.php");
           // require_once(VIEWS_PATH."signUp.php");
        

            
             //ANDA JOYA NO TOCAR
            //require_once(VIEWS_PATH."signIn.php");
            //require_once(VIEWS_PATH."company-list.php");

            //$controller =  new CompanyController;
            //$controller->ShowEditView($name, $address, $phone, $cuit);
            //$controller->ShowListView();
            //$controller->ShowManageView();
            //$controller->ShowFilterView();

            //$controller = new CareerController;
            //$controller->ShowListView();

            //$controller = new 

            /* // COMPANY ANDA TODO
            $companyDAO = new CompanyDAO;
            $companyList = $companyDAO->GetAll();
            require_once(VIEWS_PATH."company-list.php");
            */            
            
            /*// STUDENT ANDA PERFECTO
            $studentDAO = new StudentDAO();
            $studentList = array();
            $studentList = $studentDAO->GetAll();
            var_dump($studentList);
            */
        }
    }      
?>