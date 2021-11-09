<?php
    namespace PDO;
    use PDO\StudentPDO;
    use Models\User as User;
    use Models\Student as Student;
    use PDO\Connection;
    use PDOException;

    class AdministratorPDO{

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
                $administratorList = array();
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $userResults = $this->connection->Execute($query);

                foreach ($userResults as $row) {

                    $user = new User();
                    $user->setEmail($row['email']);
                    $user->setPassword($row['passwordUser']);
                    $user->setRole($row['roleUser']);

                    if($user->getRole() == "admin"){

                        array_push($administratorList, $user);
                    }
                }
                return $administratorList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        public function SearchUser($email){
            
            try {

                $parameters['email'] = $email;
                $query = "SELECT * FROM ".$this->tableName." WHERE (email = :email);";

                $this->connection = Connection::GetInstance();
                $administratortResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($administratortResults)){
                    
                    foreach ($administratortResults as $row) {

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

        public function Edit($currentEmail, User $adminEdit){

            try {

                $query = "UPDATE ".$this->tableName." SET email = :email, passwordUser = :passwordUser WHERE (email = :currentEmail);";

                $parameters["email"] = $adminEdit->getEmail();
                $parameters["passwordUser"] = $adminEdit->getPassword();   
                $parameters["currentEmail"] = $currentEmail;

                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;

            } catch (PDOException $ex) {

                throw $ex;
            }
        }


        public function Delete($administratorEmail){

            try {
                $query = "DELETE FROM ".$this->tableName." WHERE (email = :email);";
                $parameters['email'] = $administratorEmail;
                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            
            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }    
?>