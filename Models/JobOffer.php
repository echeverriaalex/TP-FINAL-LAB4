<?php
    namespace Models;

    class JobOffer{

        private $id;
        private $salary;
        private $nameCompany;
        private $jobPositionId;

        public function __construct($id = '', $salary= '', $nameCompany = '', $jobPositionId = ''){
            $this->setId($id);
            $this->setSalary($salary);
            $this->setNameCompany($nameCompany);
            $this->setJobPositionId($jobPositionId);
        }
        
        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setSalary($salary){$this->salary = $salary;}
        public function getSalary(){return $this->salary;}

        public function setNameCompany($nameCompany){$this->nameCompany = $nameCompany;}
        public function getNameCompany(){return $this->nameCompany;}

        public function setJobPositionId($jobPositionId){$this->jobPositionId = $jobPositionId;}
        public function getJobPositionId(){return $this->jobPositionId;}
    }
?>