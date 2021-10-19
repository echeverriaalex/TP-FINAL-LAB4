<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;

    class StudentDAO implements IStudentDAO
    {
        private $studentList = array();

        public function Add(Student $student)
        {
            $this->RetrieveData();            
            array_push($this->studentList, $student);
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->studentList;
        } 

        public function retrieveStudent ($studentEmail)
        {
            $this->RetrieveData();
            $studentResult = null;

            foreach($this->studentList as $student)
            {
                if($student->getEmail() == $studentEmail)
                {
                    $studentResult = $student;
                    break;
                }
            }

            return $studentResult;
        }

        private function RetrieveData(){

            $this->studentList = array();

            if(file_exists("https://utn-students-api.herokuapp.com/api/Student"))
            {

                $opt = array(
                    "http" => array(
                      "method" => "GET",
                      "header" => Header_Name.": ".Header_Value."\r\n"
                    )
                );

                $ctx = stream_context_create($opt);

                $jsonContent = file_get_contents(Request_URL_Students, false , $ctx);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setName($valuesArray["firstName"]);
                    $student->setSurname($valuesArray["lastName"]);
                    $student->setDni($valuesArray["dni"]);
                    $student->setPhone($valuesArray["phoneNumber"]);
                    $student->setGender($valuesArray["gender"]);
                    $student->setBirthDate($valuesArray["birthdate"]);
                    $student->setEmail($valuesArray["email"]);
                    $student->setStudentId($valuesArray["studentId"]);
                    $student->setCareerId($valuesArray["careerId"]);
                    $student->setFileNumber($valuesArray["fileNumber"]);
                    $student->setActive($valuesArray["active"]);

                    array_push($this->studentList, $student);
                }
            }
        }
    }
?>