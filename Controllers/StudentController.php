<?php
    namespace Controllers;
    use DAO\StudentDAO as StudentDAO;
    use PDO\StudentPDO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;
        private $studentPDO;

        public function __construct(){
            $this->studentDAO = new StudentDAO();
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
            $this->ShowFilterView();
            $studentsList = $this->studentPDO->GetAll();
            require_once(VIEWS_PATH."student-manage.php");
        }

        public function ShowFilterView(){

            $nameFilter = "Students Filter";
            $infoFilter = "You can filter by student name!";
            $controllerMethod = "Student/Filter";
            $nameParameter = "studentName";
            require_once(VIEWS_PATH."filter.php");
        }

        public function ShowListView(){
            require_once(VIEWS_PATH."select-nav.php");
            $studentList = $this->studentPDO->GetAll();
            require_once(VIEWS_PATH."student-list.php");
        }

        public function Update(){

            $this->studentPDO->UpdateStudentsDatabase();
            echo "<br> Base de datos actualizada con API <br>";
            $this->ShowManageView();
        }

        public function ShowMyProfile(){
                require_once(VIEWS_PATH."select-nav.php");
                $student = $_SESSION['userlogged'];
                require_once(VIEWS_PATH."student-profile.php");
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