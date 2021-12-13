<?php
    namespace DAO;
    use DAO\IUserPDO as IUserPDO;
    use DAO\StudentPDO as StudentPDO;
    use Models\User as User;
    use Models\Student as Student;
    use DAO\Connection as Connection;
    use PDOException;

    class UserPDO implements IUserPDO{

        private $connection;
        private $tableName = "users";

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
            $studentPDO = new StudentPDO();
            $student = $studentPDO->SearchStudent($email);
            return isset($student);
        }
    }
    
?>