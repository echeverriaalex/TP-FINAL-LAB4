<?php
    namespace PDO;
    use PDO\IUserPDO;
    use PDO\StudentPDO;
    use Models\User as User;
    use Models\Student as Student;
    use PDO\Connection;
    use PDOException;

    class UserPDO implements IUserPDO{

        private $connection;
        private $tableName = "Users";

        public function Add(User $user){

            try{
                $query = "INSERT INTO ".$this->tableName." (email, passwordUser, roleUser) VALUES (:email, :passwordUser, :roleUser);";
             
                $parameters["email"] = $user->getEmail();
                $parameters["passwordUser"] = $user->getPassword();
                $parameters["roleUser"] = $user->getRole();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(PDOException $ex){

                throw $ex;
            }
        }

        public function GetAll(){

            try {
                $userList = array();
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $userResults = $this->connection->Execute($query);

                foreach ($userResults as $row) {

                    $user = new User();
                    $user->setEmail($row['email']);
                    $user->setPassword($row['passwordUser']);
                    $user->setRole($row['roleUser']);
                    array_push($userList, $user);
                }
                return $userList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        public function SearchUser($email){
            
            try {

                $parameters['email'] = $email;
                $query = "SELECT * FROM ".$this->tableName." WHERE (email = :email);";

                $this->connection = Connection::GetInstance();
                $usertResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($usertResults)){
                    
                    foreach ($usertResults as $row) {

                        $user = new User();
                        $user->setEmail($row['email']);
                        $user->setPassword($row['passwordUser']);
                        $user->setRole($row['roleUser']);
                    }
                    return $user;
                }
                else{
                    return null;
                }

            }catch(PDOException $ex) {
                throw $ex;
            }
        }
        
        public function IsStudent($email)
        {
            $result = false;
            //$studentDAO = new StudentDAO();
            //$student = $studentDAO->RetrieveStudent($email);
            if(isset($student)){
                $result = true;
            }
            return $result;
        }

        public function RetrieveUser($email, $password)
        {
            $this->RetrieveData();
            $userResult = null;

            foreach($this->userList as $user){

                if(($user->getEmail() == $email) && (password_verify($password, $user->getPassword()))){
                    $userResult = $user;
                    break;
                }
            }
            return $userResult;
        }

        private function SaveData(){

            $arrayToEncode = array();

            foreach($this->userList as $user){

                $valuesArray["email"] = $user->getEmail();
                $valuesArray["password"] = $user->getPassword();
                $valuesArray["role"] = $user->getRole();
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);            
            file_put_contents('Data/users.json', $jsonContent);
        }

        private function RetrieveData(){

            $this->userList = array();

            if(file_exists('Data/users.json'))
            {
                $jsonContent = file_get_contents('Data/users.json');
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $user = new User();
                    $user->setEmail($valuesArray["email"]);
                    $user->setPassword($valuesArray["password"]);
                    $user->setRole($valuesArray["role"]);
                    array_push($this->userList, $user);
                }
            }
        }
    }
    
?>