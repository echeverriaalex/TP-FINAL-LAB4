<?php
    namespace Controllers;

    use DAO\CompanyDAO;
    use DAO\StudentDAO;

    class HomeController
    {
        public function viewHomeAdmin(){
       
            /*
            if($this->adminIsLogged()){
      
                require_once(VIEWS_PATH."header.php");
                require_once(VIEWS_PATH."nav-admin.php");
                require(VIEWS_PATH.'index.php');
                require_once(VIEWS_PATH."footer.php");
            }else{
              echo '<script>alert("No tiene acceso para entrar en esta pagina");</script>';
              $this->Index();
            }
            */
        }
        

        //============================================================
        //=========================== HOME ===========================
        //============================================================
        public function Index()
        {
        
            //require_once(VIEWS_PATH."header.php");
            //require_once(VIEWS_PATH."nav.php");
            //require(VIEWS_PATH."home.php");
           // require_once(VIEWS_PATH."signUp.php");
            
            
            
            //require_once(VIEWS_PATH."nav-admin.php");
            //require(VIEWS_PATH.'index.php');
            
             //ANDA JOYA NO TOCAR
            //require_once(VIEWS_PATH."signIn.php");
            
            
            
            //require_once(VIEWS_PATH."footer.php");


            require_once(VIEWS_PATH."company-list.php");

            
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

        //============================================================
        //=========================== LOGIN ==========================
        //============================================================
        public function ViewSignIn()
        {
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."signIn.php");
            require_once(VIEWS_PATH."footer.php");
        }      
        
        public function ViewSignUp()
        {
            require_once(VIEWS_PATH."header.php");
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."signUp.php");
            require_once(VIEWS_PATH."footer.php");
        }
    }       
?>