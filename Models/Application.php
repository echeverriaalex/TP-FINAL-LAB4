<?php
    namespace Models;

    class Application{

        private $id;
        private $jobOfferId;
        private $studentId;

        public function __construct($id = '', $jobOfferId= '', $studentId = ''){
            $this->setId($id);
            $this->setJobOfferId($jobOfferId);
            $this->setStudentId($studentId);
        }
        
        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setJobOfferId($jobOfferId){$this->jobOfferId = $jobOfferId;}
        public function getJobOfferId(){return $this->jobOfferId;}

        public function setStudentId($studentId){$this->studentId = $studentId;}
        public function getStudentId(){return $this->studentId;}
    }
?>