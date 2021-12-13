<?php
    namespace DAO;
    use DAO\IStudentPDO as IStudentPDO;
    use Models\Student as Student;
    use DAO\Connection as Connection;
    use Exception;
    use PDOException;

    class StudentPDO implements IStudentPDO{

        private $connection;
        private $tableName = "students";
        public static $studentListApi = array();

        public function Add(Student $newStudent){

            try{
                $query = "INSERT INTO ".$this->tableName."
                (studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, studentStatus, passwordStudent, roleStudent) VALUES 
                (:studentId, :careerId, :firstName, :lastName, :dni, :fileNumber, :gender, :birthDate, :email, :phoneNumber, :studentStatus, :passwordStudent, :roleStudent);";

                $parameters["studentId"] = $newStudent->getStudentId();
                $parameters["careerId"] = $newStudent->getCareerId();
                $parameters["firstName"] = $newStudent->getFirstName();
                $parameters["lastName"] = $newStudent->getLastName();
                $parameters["dni"] = $newStudent->getDni();
                $parameters["fileNumber"] = $newStudent->getFileNumber();
                $parameters["gender"] = $newStudent->getGender();
                $parameters["birthDate"] = $newStudent->getBirthDate();
                $parameters["email"] =$newStudent->getEmail();
                $parameters["phoneNumber"] = $newStudent->getPhoneNumber();               
                $parameters["studentStatus"] = $newStudent->getActive();
                $parameters["passwordStudent"] = $newStudent->getPassword();
                $parameters["roleStudent"] = $newStudent->getRole();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(PDOException $ex){

                throw new PDOException("Error: The student could not be registered. Try again.");
            }
        }

        public function GetAll(){

            try {
                $studentList = array();
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $studentResults = $this->connection->Execute($query);

                foreach ($studentResults as $row) {

                    $student = new Student();
                    $student->setStudentId($row['studentId']);
                    $student->setCareerId($row['careerId']);
                    $student->setFirstName($row['firstName']);
                    $student->setLastName($row['lastName']);
                    $student->setDni($row['dni']);
                    $student->setFileNumber($row['fileNumber']);
                    $student->setGender($row['gender']);
                    $student->setBirthDate($row['birthDate']);
                    $student->setEmail($row['email']);
                    $student->setPhoneNumber($row['phoneNumber']);
                    $student->setActive($row['studentStatus']);
                    $student->setPassword($row['passwordStudent']);
                    $student->setRole($row['roleStudent']);
                    array_push($studentList, $student);
                }
                return $studentList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        } 

        /*
        public function UpdateStudentsDatabase(){

            $studentListApi = $this->RetrieveDataAPI();
            
            foreach($studentListApi as $student){

                $this->Add($student);
            }
        }
        */

        public function SearchStudent($email){
            
            try {
                $parameters['email'] = $email;
                $query = "SELECT * FROM ".$this->tableName." WHERE (email = :email);";
                $this->connection = Connection::GetInstance();
                $studentResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($studentResults)){
                    foreach ($studentResults as $row) {
                        $student = new Student();
                        $student->setStudentId($row['studentId']);
                        $student->setCareerId($row['careerId']);
                        $student->setFirstName($row['firstName']);
                        $student->setLastName($row['lastName']);
                        $student->setDni($row['dni']);
                        $student->setFileNumber($row['fileNumber']);
                        $student->setGender($row['gender']);
                        $student->setBirthDate($row['birthDate']);
                        $student->setEmail($row['email']);
                        $student->setPhoneNumber($row['phoneNumber']);
                        $student->setActive($row['studentStatus']);
                        $student->setPassword($row['passwordStudent']);
                        $student->setRole($row['roleStudent']);
                    }
                    return $student;
                }
                else{
                    return null;
                }

            }catch(PDOException $ex) {
                throw $ex;
            }
        }

        public static function CheckExistenceStudentApi($email){

            $result = null;
            if(!empty(self::$studentListApi)){
                $result = self::SearchStudentApi($email);
            }
            else{
                $studentPDO = new StudentPDO();
                $studentPDO->RetrieveDataAPI();
                $result = self::SearchStudentApi($email);
            }
            return $result;
        }

        public static function SearchStudentApi($email){

            $result = null;
            if(!empty(self::$studentListApi)){
                foreach(self::$studentListApi as $student){
                    if($student->getEmail() == $email){
                        return $result = $student;
                    }
                }
            }
            return $result;
        }

        public static function getStudentListApi(){

            if(empty(self::$studentListApi)){

                $studentPDO = new StudentPDO();
                $studentPDO->RetrieveDataAPI();
                return self::$studentListApi;
            }
            else{
                return self::$studentListApi;
            }
        }

        public function RetrieveDataAPI(){

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

                array_push(self::$studentListApi, $student);
            }
           // return $this->studentListApi;
        }
    }
?>