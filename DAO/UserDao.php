<?php
    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use DAO\StudentDAO as StudentDAO;
    use Models\User as User;
    use Models\Student as Student;

    class UserDAO implements IUserDAO
    {
        private $userList = array();

        public function Add(User $user)
        {
            $this->RetrieveData();
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));           
            array_push($this->userList, $user);
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->userList;
        }
        
        public function IsStudent($email)
        {
            $result = false;
            $studentDAO = new StudentDAO();
            $student = $studentDAO->RetrieveStudent($email);
            if(isset($student)){
                $result = true;
            }
            return $result;
        }

        public function RetrieveUser($email, $password)
        {
            $this->RetrieveData();
            $userResult = new User();

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