<?php
    namespace Controllers;
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct(){$this->studentDAO = new StudentDAO();}

        public function ShowAddView(){
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowManageView(){

            $studentsList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."student-manage.php");
        }

        public function ShowListView(){

            $studentList = $this->studentDAO->GetAll();
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowMyProfile(){

            require_once(VIEWS_PATH."student-profile.php");
        }

        public function Add($name, $surname, $dni, $phone, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password){

            $student = new Student($name, $surname, $dni, $phone, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password);
            $this->studentDAO->Add($student);
            $this->ShowAddView();
        }
    }
?>