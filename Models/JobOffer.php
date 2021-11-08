<?php
    namespace Models;

    class JobOffer{

        private $companyName;
        private $jobPositionId;
        private $salary;

        public function __construct($companyName = '',$jobPositionId = '', $salary = ''){

            $this->setCompanyName($companyName);
            $this->setjobPositionId($jobPositionId);
            $this->setSalary($salary);
        }

        public function getCompanyName(){return $this->companyName;}
        public function getjobPositionId(){return $this->jobPositionId;}
        public function getSalary(){return $this->salary;}
        public function setCompanyName($companyName){$this->companyName = $companyName;}
        public function setjobPositionId($jobPositionId){$this->jobPositionId = $jobPositionId;}
        public function setSalary($salary){$this->salary = $salary;}
    }
?>