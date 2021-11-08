<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use PDO\StudentPDO;
    use PDO\UserPDO;

    class UserController{

        //private $userDAO;
        private $studentDAO;
        private $studentPDO;
        private $userPDO;

        public function __construct(){
            
            //$this->userDAO = new UserDAO();
            $this->studentDAO = new StudentDAO();
            $this->userPDO = new UserPDO();
            $this->studentPDO = new StudentPDO();
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

        public function ShowStudentView(){

            require_once(VIEWS_PATH."nav-user.php");
            require_once(VIEWS_PATH."student-profile.php");
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

            //$user = $this->userDAO->RetrieveUser($email, $password);
            //$student = $this->studentDAO->retrieveStudent($email);
            //$result = $this->studentDAO->retrieveStudent($email);

            $user = $this->userPDO->SearchUser($email);

            /*if(!empty($user) && $user->getRole() == "student"){
                
                $student = $this->studentPDO->SearchStudent($user->getEmail());
                $_SESSION['studentlogged'] = $student;
                //$this->ShowStudentView();
                require_once(VIEWS_PATH."nav-user.php");
                require_once(VIEWS_PATH."student-profile.php");
            }*/

            if(!empty($user)){

                switch($user->getRole()){

                    case "student": 
                        $student = $this->studentPDO->SearchStudent($user->getEmail());
                        $student->setPassword($user->getPassword());
                        $student->setRole($user->getRole());
                        $_SESSION['userlogged'] = $student;
                        //$this->ShowStudentView();                       
                        require_once(VIEWS_PATH."select-nav.php");
                        require_once(VIEWS_PATH."student-profile.php");
                        break;

                    case "admin": 
                        $_SESSION['userlogged'] = $user;
                        //$this->ShowStudentView();                        
                        require_once(VIEWS_PATH."select-nav.php");
                        require_once(VIEWS_PATH."home.php");
                        break;
                    
                    default:
                            echo "<br><br> ERROR DE USUARIO ".$user->getRole().", NO EXISTE O ES STUDENT O ADMIN NO HAY OTRO ROL.";
                            break;        
                }
            }






            /*
            if(isset($student) && ($student->getEmail() != ""))
            {
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['role'] = $user->getRole();
                if($user->getRole() == "admin"){
                    $this->ShowAdminHome();
                } else {
                    //$this->ShowUserHome();
                    //
                    require_once(VIEWS_PATH."nav-user.php");
                    require_once(VIEWS_PATH."student-profile.php");
                }
            } else {
            $this->ShowSignInView();}

            

            */
        }

        public function LogOut(){

            $_SESSION = null; 
            unset($_SESSION['userlogged']);
            session_destroy();
            header("location: ../Home/Index");
        }
    }
?>