<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct(){
            
            $this->userDAO = new UserDAO();
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
            require(VIEWS_PATH.'home.php');    
        }

        public function ShowUserHome()
        {
            require_once(VIEWS_PATH."nav-user.php");
            require(VIEWS_PATH.'user-profile.php');
        }
     
        public function Add($email, $password){

            if($this->userDAO->isStudent($email)){
                $user = new User($email, $password, "user");
                $this->userDAO->add($user);
                $this->ShowSignUpView();
               
            } else {
                $this->ShowSignUpView();
            }  
        }

        public function LogIn($email, $password){

            $user = $this->userDAO->RetrieveUser($email, $password);
            
            if(isset($user) && ($user->getEmail() != ""))
            {
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['role'] = $user->getRole();
                if($user->getRole() == "admin"){
                    $this->ShowAdminHome();
                } else {
                    $this->ShowUserHome();
                }
            } else {
            $this->ShowSignInView();}

            require_once(VIEWS_PATH."user-profile.php");
        }

        public function LogOut(){

            session_destroy();
            header("location: ../Home/Index");
        }
    }
?>