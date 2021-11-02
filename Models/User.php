<?php
    namespace Models;

    class User
    {
        private $email;
        private $password;
        private $role;

        public function __construct($email='', $password='', $role=''){

            $this->setEmail($email);
            $this->setPassword($password);
            $this->setRole($role);
        }

        public function getEmail(){return $this->email;}
        public function setEmail($email){$this->email = $email;}
        
        public function getPassword(){return $this->password;}
        public function setPassword($password){$this->password = $password;}

        public function getRole(){return $this->role;}
        public function setRole($role){$this->role = $role;}
    }
?>