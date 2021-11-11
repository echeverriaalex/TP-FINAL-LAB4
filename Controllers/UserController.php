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

            $userResult = $this->userPDO->SearchUser($email);
            
            if(empty($userResult)){
                $user = new User($email, $password, "student");
                //$this->userDAO->add($user);
                $this->userPDO->Add($user);
                $this->ShowSignInView();
               
            } else {

                echo "<script>alert('The email entered already exists, please enter another');</script>";
                $this->ShowSignInView();
            }  
        }

    
        /*
        public function signUp ($firstName, $lastName, $dni, $email,$password){


        $homeController = new HomeController();

        if($this->pdo->checkEmailRegistrado($email))
        {

            $user = new User();
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPassword($password);


            $validation = false;
            
            if ($user->getFirstName() != '' && $user->getLastName() != '' && $user->getDni() < 0 && $user->getDni() != '' && $user->getPassword() != '') {
            
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $validation = true;
                }
            }

            if($validation){

                //ACA VA LA PAGINA DIRECTAMENTE
                $this->pdo->create($user);
               //INICIA SESSION ANTES
               if(!isset($_SESSION['userLog']))
                {
                   $_SESSION['userLog'] = $user;
                   $homeController = new HomeController();
                   $homeController->viewCartelera();
              }


              }

            }else
            {
                echo "<script>alert('The email entered already exists, please enter another');";
                echo "</script>";
                $homeController->viewSignUp();
            }
        }
        */


        /*
        public function create($user){
            
            $sql = "INSERT INTO users(FirstName,LastName,DNI,Email,Pass) VALUES(:FirstName,:LastName,:DNI,:Email,:Pass)";

            $parameters['FirstName'] = $user->getFirstName();
            $parameters['LastName'] = $user->getLastName();
            $parameters['DNI'] = $user->getDni();
            $parameters['Email'] = $user->getEmail();
            $parameters['Pass'] = $user->getPassword();

            try{
                $this->connection = connection::GetInstance();
                return $this->connection->ExecuteNonQuery($sql,$parameters);
            }catch(PDOException $e){
                throw new PDOException($e->getMessage());
            }
        }
        */

        public function LogIn($email, $password){

            $user = $this->userPDO->SearchUser($email);

            if(!empty($user)){

                switch($user->getRole()){

                    case "student": 
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
            else{

                require_once(VIEWS_PATH."select-nav.php");
                echo "<script> alert('Error when logging in, the email is not registered.');</script>";
                require_once(VIEWS_PATH."signIn.php");
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