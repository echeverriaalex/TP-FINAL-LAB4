<?php
    namespace Controllers;

    use DAO\StudentDAO;
    use DAO\UserDAO as UserDAO;
    use Models\Student;
    use Models\User as User;

    class UserController
    {
        //private $userDAO;
        private $studentDAO;

        public function __construct(){
            
            //$this->userDAO = new UserDAO();
            $this->studentDAO = new StudentDAO();
        }

        public function ShowSignInView()
        {
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."signIn.php");
        }

        public function ShowSignUpView()
        {
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."signUp.php");
        }

        public function ShowAdminHome()
        {
            require_once(VIEWS_PATH."nav-admin.php");            
            require_once(VIEWS_PATH."company-filter.php");
            require(VIEWS_PATH.'index.php');
        }

        public function ShowUserHome()
        {
            require_once(VIEWS_PATH."nav-user.php");
            //require_once(VIEWS_PATH."company-filter.php");
            require(VIEWS_PATH.'student-profile.php');
        }
     
        public function Add($email, $password){

            if($this->userDAO->IsStudent($email)){
                $user = new User($email, $password, "user");
                $this->userDAO->Add($user);
                $this->ShowSignUpView();
               
            } else {
                $this->ShowSignUpView();
            }  
        }

        public function LogIn($email, $password){

            //$user = $this->userDAO->RetrieveUser($email, $password);
            $student = $this->studentDAO->retrieveStudent($email);
            
            if(isset($student) && ($student->getEmail() != ""))
            {
                $_SESSION['email'] = $student->getEmail();
                $_SESSION['role'] = $student->getRole();
                if($student->getRole() == "admin"){
                    $this->ShowAdminHome();
                } else {
                    //$this->ShowUserHome();
                    $_SESSION['studentlogged'] = $student;
                    require_once(VIEWS_PATH."nav-user.php");
                    require_once(VIEWS_PATH."student-profile.php");
                }
            } else {
            $this->ShowSignInView();}

            require_once(VIEWS_PATH."student-profile.php");
        }

        public function LogOut(){

            $_SESSION = null; 
            unset($_SESSION['studentlogged']);
            session_destroy();
            $home = new HomeController();
            $home->Index();
        }
    }
?>