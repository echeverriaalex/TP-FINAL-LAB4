<?php
    namespace Models;

    class JobOffer{

        private $id;
        private $salary;
        private $companyId;
        private $jobPositionId;

        public function __construct($id = '', $salary= '', $companyId = '', $jobPositionId = ''){
            $this->setId($id);
            $this->setSalary($salary);
            $this->setCompanyId($companyId);
            $this->setJobPositionId($jobPositionId);
        }
        
        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setSalary($salary){$this->salary = $salary;}
        public function getSalary(){return $this->salary;}

        public function setCompanyId($companyId){$this->companyId = $companyId;}
        public function getCompanyId(){return $this->companyId;}

        public function setJobPositionId($jobPositionId){$this->jobPositionId = $jobPositionId;}
        public function getJobPositionId(){return $this->jobPositionId;}
    }
?>