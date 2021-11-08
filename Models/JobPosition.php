<?php
    namespace Models;

    class JobPosition{

        private $id;
        private $description;
        private $careerId;

        public function __construct($id = '', $description= '', $careerId = ''){
            $this->setId($id);
            $this->setDescription($description);
            $this->setCareerId($careerId);
        }
        
        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setDescription($description){$this->description = $description;}
        public function getDescription(){return $this->description;}

        public function setCareerId($careerId){$this->careerId = $careerId;}
        public function getCareerId(){return $this->careerId;}
    }
?>