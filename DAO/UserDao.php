<?php
    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use DAO\StudentDAO as StudentDAO;
    use Models\User as User;
    use Models\Student as Student;

    class UserDAO implements IUserDAO
    {
        private $userList = array();

        public function add(User $user)
        {
            $this->retrieveData();
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));           
            array_push($this->userList, $user);
            $this->saveData();
        }

        public function getAll()
        {
            $this->retrieveData();
            return $this->userList;
        }
        
        public function isStudent($email)
        {
            $studentDAO = new StudentDAO();
            $student = $studentDAO->retrieveStudent($email);
            return isset($student);
        }

        public function retrieveUser($email, $password)
        {
            $this->retrieveData();
            $userResult = null;

            foreach($this->userList as $user){

                if(($user->getEmail() == $email) && (password_verify($password, $user->getPassword()))){
                    $userResult = $user;
                    break;
                }
            }
            return $userResult;
        }

        private function saveData(){

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

        private function retrieveData(){

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