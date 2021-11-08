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
            require_once(VIEWS_PATH."nav-admin.php");
            $studentsList = $this->studentDAO->getAll();
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
            $studentList = $this->studentDAO->getAll();
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

        public function Add($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password){

            $student = new Student($firstName, $lastName, $dni, $phoneNumber, $gender, $birthDate, $email, $studentId, $carrerId, $fileNumber, $active, $password);
            $this->studentDAO->add($student);
            $this->ShowAddView();
        }
    }
?>