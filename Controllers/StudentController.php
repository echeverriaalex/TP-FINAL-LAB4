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

           // if(isset($_SESSION['userlogged'])){

                require_once(VIEWS_PATH."nav-user.php");
                require_once(VIEWS_PATH."home.php");
           // }
           // else{

               // $home = new HomeController();
              //  $home->Index();
           // }
        }

        public function ShowAddView(){
            require_once(VIEWS_PATH."nav-admin.php");
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowManageView(){

            require_once(VIEWS_PATH.'nav-admin.php');
            $this->ShowFilterView();
            //$studentsList = $this->studentDAO->GetAll();
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
            require_once(VIEWS_PATH."nav-admin.php");
            //$studentList = $this->studentDAO->GetAll();
            $studentList = $this->studentPDO->GetAll();
            require_once(VIEWS_PATH."student-list.php");
        }

        public function Update(){

            $this->studentPDO->UpdateStudentsDatabase();
            echo "<br> Base de datos actualizada con API <br>";
            $this->ShowManageView();
        }

        public function ShowMyProfile(){

          //  if(isset($_SESSION['userlogged'])){

                require_once(VIEWS_PATH."nav-user.php");
                $student = $_SESSION['userlogged'];
                require_once(VIEWS_PATH."student-profile.php");
           /* }
            else{

                $home = new HomeController();
                $home->Index();
            }
            */
        }

        public function Filter ($studentName){

            require_once(VIEWS_PATH."select-nav.php");       
            //$company = $this->companyDAO->Filter($studentName);
            $student = $this->studentPDO->SearchStudent($studentName);
            //require_once(VIEWS_PATH. "student-profile.php");
            
            if($student != null && $student->getFirstName() != "") {

                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "student-profile.php");

            } else {
                //$this->ShowFilterView();
                // aca despues poner select nav porque tambien lo van a usar los estudiantes
                require_once(VIEWS_PATH."select-nav.php");
                require_once(VIEWS_PATH. "student-profile.php");
            }            
        }

        public function Add($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password){

            $student = new Student($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password);
            $this->studentDAO->add($student);
            $this->ShowAddView();
        }
    }
?>