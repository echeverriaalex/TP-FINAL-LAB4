<?php
    namespace Models;

    class JobOffer{

        private $photo;
        private $id;
        private $salary;
        private $nameCompany;
        private $jobPositionId;
        private $creationDate;
        private $culmination;

        public function __construct($nameCompany = '', $salary= '', $jobPositionId = '', $photo='', $creationDate='', $culmination='', $id = ''){
            $this->setId($id);
            $this->setSalary($salary);
            $this->setNameCompany($nameCompany);
            $this->setJobPositionId($jobPositionId);
            $this->setPhoto($photo);
            $this->setCreationDate($creationDate);
            $this->setCulmination($culmination);
        }

        public function setPhoto($photo){$this->photo = $photo;}
        public function getPhoto(){return $this->photo;}
        
        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setSalary($salary){$this->salary = $salary;}
        public function getSalary(){return $this->salary;}

        public function setNameCompany($nameCompany){$this->nameCompany = $nameCompany;}
        public function getNameCompany(){return $this->nameCompany;}

        public function setJobPositionId($jobPositionId){$this->jobPositionId = $jobPositionId;}
        public function getJobPositionId(){return $this->jobPositionId;}

        public function setCreationDate($creationDate){$this->creationDate = $creationDate;}
        public function getCreationDate(){return $this->creationDate;}

        public function setCulmination($culmination){$this->culmination = $culmination;}
        public function getCulmination(){return $this->culmination;}
    }
?>