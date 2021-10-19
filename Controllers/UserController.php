<?php
    namespace Controllers;
    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct(){$this->userDAO = new UserDAO();}

        public function ShowSignInView($msg = "")
        {
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."signIn.php".$msg);
        }

        public function ShowSignUpView($msg = "")
        {
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."signUp.php".$msg);
        }

        /*
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
        */

        public function Add($email, $password){

            if($this->userDAO->IsStudent($email)){
                $user = new User($email, $password, "user");
                $this->userDAO->Add($user);
                $this->ShowSignUpView();
            } else {
                $this->ShowSignUpView("?msg=incorrect");
            }  
        }

        public function logIn($email, $password)
        {
            $user = $this->UserDAO->RetrieveUser($email, $password);
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
            $this->ShowSignInView("?msg=logerror");}
        }
    }
?>