<?php
    namespace Controllers;
    use DAO\StudentDAO as StudentDAO;
    use DAO\StudentPDO;
    use Models\Student as Student;
    use DAO\SessionCheck;

    class StudentController
    {
        //private $studentDAO;
        private $studentPDO;

        public function __construct(){
            //$this->studentDAO = new StudentDAO();
            $this->studentPDO = new StudentPDO;
        }

        public function IndexStudent(){
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH."home.php");
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowManageView(){

            require_once(VIEWS_PATH.'select-nav.php');

            if(SessionCheck::Check()){
                $this->ShowFilterView();
                $studentsList = StudentPDO::getStudentListApi();
                require_once(VIEWS_PATH."student-manage.php");
            }
            else
                header("location: ../Home/Index");
        }

        public function ShowFilterView(){

            $nameFilter = "Students Filter";
            $infoFilter = "You can filter by student name!";
            $controllerMethod = "Student/Filter";
            $nameParameter = "studentName";
            require_once(VIEWS_PATH."filter.php");
        }

        public function ShowListStudentsRegisteredSystemView(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check()){

                $studentListRegistered = $this->studentPDO->GetAll();
                require_once(VIEWS_PATH."student-list.php");
            }
            else
                header("location: ../Home/Index");
        }

        public function ShowMyProfile(){
            require_once(VIEWS_PATH."select-nav.php");
            if(SessionCheck::Check()){
                $student = $_SESSION['userlogged'];
                require_once(VIEWS_PATH."student-profile.php");
            }
            else
                header("location: ../Home/Index");
        }

        public function Filter ($studentName){

            require_once(VIEWS_PATH."select-nav.php");       
            $student = $this->studentPDO->SearchStudent($studentName);
            
            if($student != null && $student->getFirstName() != "") {

                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "student-profile.php");

            } else {
                $this->ShowFilterView();
            }            
        }

        public function Add($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password){

            $student = new Student($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password);
            $this->studentPDO->Add($student);
            $this->ShowAddView();
        }
    }
?>