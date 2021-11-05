<?php
    namespace Models;

    class JobPosition{

        private $jobPositionId;
        private $careerId;
        private $description;

        public function __construct($jobPositionId = '',$careerId = '', $description = ''){

            $this->setJobPositionId($jobPositionId);
            $this->setCareerId($careerId);
            $this->setDescription($description);
        }

        public function getJobPositionId(){return $this->jobPositionId;}
        public function getCareerId(){return $this->careerId;}
        public function getDescription(){return $this->description;}
        public function setJobPositionId($jobPositionId){$this->jobPositionId = $jobPositionId;}
        public function setCareerId($careerId){$this->careerId = $careerId;}
        public function setDescription($description){$this->description = $description;}
    }
?>