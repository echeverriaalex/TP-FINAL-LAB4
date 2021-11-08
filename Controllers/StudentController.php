<?php
    namespace Controllers;
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct(){$this->studentDAO = new StudentDAO();}

        public function IndexStudent(){

            require_once(VIEWS_PATH."nav-user.php");
            require_once(VIEWS_PATH."home.php");
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowManageView(){
            require_once(VIEWS_PATH."nav-admin.php");
            $studentsList = $this->studentDAO->getAll();
            require_once(VIEWS_PATH."student-manage.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."nav-admin.php");
            $studentList = $this->studentDAO->getAll();
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowMyProfile(){

            require_once(VIEWS_PATH."nav-user.php");
            require_once(VIEWS_PATH."student-profile.php");
        }

        public function Add($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password){

            $student = new Student($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password);
            $this->studentDAO->add($student);
            $this->ShowAddView();
        }
    }
?>