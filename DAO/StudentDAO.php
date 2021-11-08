<?php
    namespace DAO;
    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;

    class StudentDAO implements IStudentDAO{

        private $studentList = array();

        public function getAll(){

            $this->retrieveData();
            return $this->studentList;
        } 

        public function retrieveStudent ($studentEmail){

            $this->retrieveData();
            $studentResult = new Student();

            foreach($this->studentList as $student){

                if($student->getEmail() == $studentEmail){

                    $studentResult = $student;
                    break;
                }
            }
            return $studentResult;
        }

        private function retrieveData(){

            $this->studentList = array();
        
            $opt = array(
                "http" => array(
                    "method" => "GET",
                    "header" => Header_Name.": ".Header_Value."\r\n"
                )
            );

            $ctx = stream_context_create($opt);
            $jsonContent = file_get_contents(Request_URL_Students, false , $ctx);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
          
            foreach($arrayToDecode as $valuesArray){

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