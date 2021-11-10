<?php
    namespace Controllers;
    use Models\User as User;
    use PDO\StudentPDO;
    use PDO\UserPDO;

    class UserController{

        private $studentDAO;
        private $studentPDO;
        private $userPDO;

        public function __construct(){
            $this->userPDO = new UserPDO();
            $this->studentPDO = new StudentPDO();
        }

        public function ShowSignInView()
        {
            require_once(VIEWS_PATH."select-nav.php");
            require(VIEWS_PATH."signIn.php");
        }

        public function ShowSignUpView()
        {
            require_once(VIEWS_PATH."select-nav.php");
            require(VIEWS_PATH."signUp.php");
        }

        public function ShowAdminHome()
        {
            require_once(VIEWS_PATH."select-nav.php");            
            require_once(VIEWS_PATH."home.php");
        }

        public function ShowUserHome()
        {
            require_once(VIEWS_PATH."select-nav.php");
            require(VIEWS_PATH.'student-profile.php');
        }
     
        public function Add($email, $password){

            if($this->userPDO->IsStudent($email)){
                $user = new User($email, $password, "user");
                $this->userPDO->Add($user);
                echo "<script> alert('El alumno se registro exitosamente.');</script>";
                $this->ShowSignUpView();
            } else {
                $this->ShowSignUpView();
            }  
        }

        public function LogIn($email, $password){

            $user = $this->userPDO->SearchUser($email);

            if(!empty($user)){

                switch($user->getRole()){

                    case "user": 
                        $student = $this->studentPDO->SearchStudent($user->getEmail());
                        $student->setPassword($user->getPassword());
                        $student->setRole($user->getRole());
                        $_SESSION['userlogged'] = $student;                    
                        require_once(VIEWS_PATH."select-nav.php");
                        require_once(VIEWS_PATH."student-profile.php");
                        break;

                    case "admin": 
                        $_SESSION['userlogged'] = $user;                      
                        require_once(VIEWS_PATH."select-nav.php");
                        require_once(VIEWS_PATH."home.php");
                        break;
                    
                    default:
                            echo "<br><br> ERROR DE USUARIO ".$user->getRole().", NO EXISTE O ES STUDENT O ADMIN NO HAY OTRO ROL.";
                            break;        
                }
            }
        }

        public function LogOut(){

            $_SESSION = null; 
            unset($_SESSION['userlogged']);
            session_destroy();
            header("location: ../Home/Index");
        }
    }
?>