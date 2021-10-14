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

        private function SaveData(){

            $arrayToEncode = array();

            foreach($this->studentList as $student){

                $valuesArray["name"] = $student->getName();
                $valuesArray["surname"] = $student->getSurname();
                $valuesArray["dni"] = $student->getDni();
                $valuesArray["phone"] = $student->getPhone();
                $valuesArray["gender"] = $student->getGender();
                $valuesArray["birthDate"] = $student->getBirthDate();
                $valuesArray["email"] = $student->getEmail();
                $valuesArray["studentId"] = $student->getStudentId();
                $valuesArray["carrerId"] = $student->getCarrerId();
                $valuesArray["fileNumber"] = $student->getFileNumber();
                $valuesArray["active"] = $student->getActive();
                $valuesArray["password"] = $student->getPassword();
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);            
            file_put_contents('Data/students.json', $jsonContent);
        }

        private function RetrieveData(){

            $this->studentList = array();

            if(file_exists('Data/students.json'))
            {
                $jsonContent = file_get_contents('Data/students.json');
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setName($valuesArray["name"]);
                    $student->setSurname($valuesArray["surname"]);
                    $student->setDni($valuesArray["dni"]);
                    $student->setPhone($valuesArray["phone"]);
                    $student->setGender($valuesArray["gender"]);
                    $student->setBirthDate($valuesArray["birthDate"]);
                    $student->setEmail($valuesArray["email"]);
                    $student->setStudentId($valuesArray["studentId"]);
                    $student->setCarrerId($valuesArray["carrerId"]);
                    $student->setFileNumber($valuesArray["fileNumber"]);
                    $student->setActive($valuesArray["active"]);
                    $student->setPassword($valuesArray["password"]);
                    array_push($this->studentList, $student);
                }
            }
        }
    }
    
?>