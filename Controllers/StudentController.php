<?php
    namespace Controllers;
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct(){$this->studentDAO = new StudentDAO();}

        public function IndexStudent(){

            if(isset($_SESSION['studentlogged'])){

                require_once(VIEWS_PATH."nav-user.php");
                require_once(VIEWS_PATH."home.php");
            }
            else{

                $home = new HomeController();
                $home->Index();
            }
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowManageView(){

            $studentsList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."student-manage.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."nav-admin.php");
            $studentList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowMyProfile(){

            if(isset($_SESSION['studentlogged'])){

                require_once(VIEWS_PATH."nav-user.php");
                $student = $_SESSION['studentlogged'];
                require_once(VIEWS_PATH."student-profile.php");
            }
            else{

                $home = new HomeController();
                $home->Index();
            }
        }

        public function Add($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password){

            $student = new Student($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password);
            $this->studentDAO->Add($student);
            $this->ShowAddView();
        }
    }
?>