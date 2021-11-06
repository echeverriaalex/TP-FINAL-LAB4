<?php
    namespace Models;

    class JobOffer{

        private $companyName;
        private $jobPosition;
        private $salary;

        public function __construct($companyName = '',$jobPosition = '', $salary = ''){

            $this->setCompanyName($companyName);
            $this->setJobPosition($jobPosition);
            $this->setSalary($salary);
        }

        public function getCompanyName(){return $this->companyName;}
        public function getJobPosition(){return $this->jobPosition;}
        public function getSalary(){return $this->salary;}
        public function setCompanyName($companyName){$this->companyName = $companyName;}
        public function setJobPosition($jobPosition){$this->jobPosition = $jobPosition;}
        public function setSalary($salary){$this->salary = $salary;}
    }
?>