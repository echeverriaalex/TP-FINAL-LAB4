<?php
    namespace Controllers;
    use DAO\SessionCheck;
    use DAO\AdministratorPDO;
    use Models\User as User;
    use DAO\CompanyPDO;
    use DAO\StudentPDO;
    use DAO\UserPDO;
    use Models\Company;
    use Models\Student as Student;
    use PDOException;

    class UserController{

        private $companyPDO;
        private $studentPDO;
        private $userPDO;
        private $adminPDO;

        public function __construct(){
            $this->userPDO = new UserPDO();
            $this->studentPDO = new StudentPDO();
            $this->companyPDO = new CompanyPDO();
            $this->adminPDO = new AdministratorPDO();
        }

        public function ShowSignInView(){
            require_once(VIEWS_PATH."select-nav.php");
            if(!SessionCheck::Check()){
                require(VIEWS_PATH."signIn.php");
            }
            else
                header("location: ../Home/Index");
        }

        public function ShowSignUpView(){
            require_once(VIEWS_PATH."select-nav.php");
            if(!SessionCheck::Check()){
                require(VIEWS_PATH."signUp.php");
            }
            else
                header("location: ../Home/Index");
        }

        public function ShowAdminHome(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check()){
                require_once(VIEWS_PATH."home.php");
            }
            else
                header("location: ../Home/Index");
        }

        public function ShowStudentHome(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check()){
                require(VIEWS_PATH.'student-profile.php');
            }
            else
                header("location: ../Home/Index");
        }

        public function ShowCompanyHome(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check()){
                require(VIEWS_PATH.'company-profile.php');
            }
            else
                header("location: ../Home/Index");
        }
     
        public function Add($email, $password, $typeUser){

            if(!SessionCheck::Check()){
                switch($typeUser){
                    case "student": $this->AddStudent($email, $password, $typeUser); break;
                    case "admin": $this->AddAdmin($email, $password, $typeUser);break;
                    //case "company": $this->AddCompany($email, $password, $typeUser);break;
                    default: 
                        echo "<script>alert('The email or typeuser entered is not correct, try again.');</script>";
                        $this->ShowSignUpView();
                        break;
                }
            }
            else
                header("location: ../Home/Index");
        }

        public function AddStudent($email, $password, $typeUser){
            $result = StudentPDO::CheckExistenceStudentApi($email);
            if(!empty($result)){
                $existeceUTN = $this->studentPDO->SearchStudent($email);
                if(empty($existeceUTN)){
                    if($result->getActive()){
                        $student = new Student();
                        $student = $result;
                        $student->setPassword($password);
                        $student->setRole($typeUser);
                        try{
                            $studentPDO = new StudentPDO();
                            $studentPDO->Add($student);
                            $_SESSION['userlogged'] = $student;                    
                            $this->ShowStudentHome();
                        }
                        catch(PDOException $exStudentPDO){
                            echo "<script>alert('".$exStudentPDO->getMessage();"');</script>";
                            $this->ShowSignUpView();
                        }
                    }
                    else{
                        echo "<script>alert('Student is not active. Ask the utn for help.');</script>";
                        $this->ShowSignUpView();
                    }
                }
                else{
                    echo "<script>alert('The student is already registered. Please login.');</script>";
                    $this->ShowSignInView();
                }           
            }
            else{
                echo "<script>alert('The email entered does not exist in the UTN records. Try again with another email or sing in with this email.');</script>";
                $this->ShowSignUpView();
            }
        }

        public function AddAdmin($email, $password, $typeUser){
            $result = $this->adminPDO->SearchAdmin($email);
            if(empty($result)){
                $user = new User($email, $password, $typeUser);

                $passwordAdmi = null;
                ////readline("Ingrese contraseña para ser admin: ");
                
                //fscanf(STDIN, "ingrese la clave", $passwordAdmi);

                //if($passwordAdmi == "123"){
                    try{
                        $this->adminPDO->Add($user);
                        $_SESSION['userlogged'] = $user;   
                        $this->ShowAdminHome();
                    }
                    catch(PDOException $exAdminPDO){
                        echo "<script>alert('".$exAdminPDO->getMessage();"');</script>";
                        $this->ShowSignUpView();
                    }
                //}
            }                    
            else{
                echo "<script>alert('The email entered is already registered, try a new one or sign in with it.');</script>";
                $this->ShowSignInView();
            }
        }

        public function AddCompany($email, $password, $name, $address, $cuit, $phone){

            $company = new Company($name,$address, $phone,$cuit, $email, $password, "company");
            $companyPDO = new CompanyPDO();

            $result = $companyPDO->SearchCompany($email);
            if(empty($result)){
                try{
                    $companyPDO->Add($company);
                    $_SESSION['userlogged'] = $company;                    
                    $this->ShowCompanyHome();
                }
                catch(PDOException $exCompanyPDO){
                    echo "<script>alert('".$exCompanyPDO->getMessage();"');</script>";
                    $this->ShowSignUpView();
                }
            }
            else{
                 echo "<script>alert('The email entered is already registered, try a new one or sign in with it.');</script>";
                 $this->ShowSignInView();
            }
        }


            /*
            
            if(empty($userResult)){
                $user = new User($email, $password, "student");
                //$this->userDAO->add($user);
                $this->userPDO->Add($user);
                $this->ShowSignInView();
               
            } else {

                echo "<script>alert('The email entered already exists, please enter another');</script>";
                $this->ShowSignInView();
            }  
            */
        

    
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

            $userResult = $this->DetectUser($email);

            if(!empty($userResult)){
                switch($userResult->getRole()){
                    case "student": 
                        if($password == $userResult->getPassword()){
                            $_SESSION['userlogged'] = $userResult;
                            $this->ShowStudentHome();
                        }
                        else{
                            echo "<script> alert('Error when logging in, Email or password was not correct.');</script>";
                            $this->ShowSignInView();
                        }
                        break;

                    case "admin":                        
                        if($password == $userResult->getPassword()){
                            $_SESSION['userlogged'] = $userResult;                      
                            $this->ShowAdminHome();
                        }
                        else{
                            echo "<script> alert('Error when logging in, Email or password was not correct.');</script>";
                            $this->ShowSignInView();
                        }
                        break;

                    case "company":
                        if($password == $userResult->getPassword()){
                            $_SESSION['userlogged'] = $userResult;
                            $this->ShowCompanyHome();
                        }
                        else{
                            echo "<script> alert('Error when logging in, Email or password was not correct.');</script>";
                            $this->ShowSignInView();
                        }
                        break;
                    
                    default:
                            echo "<br><br> ERROR DE USUARIO ".$userResult->getRole().", NO EXISTE O ES STUDENT O ADMIN NO HAY OTRO ROL.";
                            break;        
                }
            }
            else{
                echo "<script> alert('Error when logging in, the email is not registered.');</script>";
                $this->ShowSignInView();
            }
        }

        public function DetectUser($email){

            $userResult = null;
            $student = $this->studentPDO->SearchStudent($email);

            if(!empty($student)){
                $userResult = $student;
                return $userResult;
            }
            else{
                $company = $this->companyPDO->SearchCompany($email);
                if(!empty($company)){
                    $userResult = $company;
                    return $userResult;
                }
                else{
                    $admin = $this->adminPDO->SearchAdmin($email);
                    if(!empty($admin)){
                        $userResult = $admin;
                        return $userResult;
                    }
                }
            }
            return $userResult;
        }

        public function LogOut(){

            $_SESSION = null; 
            unset($_SESSION['userlogged']);
            session_destroy();
            header("location: ../Home/Index");
        }
    }
?>