<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;

    class StudentDAO implements IStudentDAO
    {
        private $studentList = array();

        /*
        public function Add(Student $student)
        {
            $this->RetrieveData();            
            array_push($this->studentList, $student);
            //$this->SaveData();
        }
        */

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

                $opt = array(
                    "http" => array(
                      "method" => "GET",
                      //"header" => x-api-key.": ".Header_Value."\r\n"
                      "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
                    )
                );

                $ctx = stream_context_create($opt);

                $jsonContent = file_get_contents(Request_URL_Students, false , $ctx);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setFirstName($valuesArray["firstName"]);
                    $student->setLastName($valuesArray["lastName"]);
                    $student->setDni($valuesArray["dni"]);
                    $student->setPhoneNumber($valuesArray["phoneNumber"]);
                    $student->setGender($valuesArray["gender"]);
                    $student->setBirthDate($valuesArray["birthDate"]);
                    $student->setEmail($valuesArray["email"]);
                    $student->setStudentId($valuesArray["studentId"]);
                    $student->setCareerId($valuesArray["careerId"]);
                    $student->setFileNumber($valuesArray["fileNumber"]);
                    $student->setActive($valuesArray["active"]);

                    array_push($this->studentList, $student);
                }            
        }
    }
?>