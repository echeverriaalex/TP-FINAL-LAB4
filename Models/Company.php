<?php
    namespace Models;
    use Models\User;

    class Company extends User{

        private $name;
        private $address;
        private $phone;
        private $cuit;

        public function __construct($name= '', $address= '', $phone= '', $cuit= '', $email='', $password='', $role=''){
            
            parent::__construct($email, $password, $role);
            $this->setName($name);
            $this->setAddress($address);
            $this->setPhone($phone);
            $this->setCuit($cuit);
        }
        
        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}

        public function setPhone($phone){$this->phone = $phone;}
        public function getPhone(){return $this->phone;}

        public function setCuit($cuit){$this->cuit = $cuit;}
        public function getCuit(){return $this->cuit;}
    }
?>