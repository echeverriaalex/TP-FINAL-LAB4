<?php
    namespace Controllers;

    use DAO\StudentDAO;
    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct(){$this->userDAO = new UserDAO();}

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
            require(VIEWS_PATH.'index.php');
        }

        public function ShowUserHome()
        {
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH.'index.php');
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

        public function LogIn($email, $password)
        {
            $user = $this->userDAO->RetrieveUser($email, $password);
            if(isset($user))
            {
                $_SESSION['email'] = $user->getEmail();
                if($user->getRole() == "admin"){
                    $_SESSION['role'] = $user->getRole();
                    $this->ShowAdminHome();
                } else {
                    $_SESSION['role'] = $user->getRole();
                    $this->ShowUserHome();
                }
            } else {
            $this->ShowSignInView();}
        }
      
        public function LogOut()
        {
            session_destroy();
        }
    }
?>