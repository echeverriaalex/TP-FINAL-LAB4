<?php
    namespace DAO;
    use Models\JobOffer;
    use DAO\Connection;
    use PDOException;

    class JobOfferPDO implements IJobOfferPDO{
        private $connection;
        private $tableName = "jobOffers";
        
        public function Add(JobOffer $jobOffer){
            try{
                $query = "INSERT INTO ".$this->tableName." (salary, nameCompany, jobPositionId, photo, creationDate, culmination) VALUES (:salary, :nameCompany, :jobPositionId, :photo, :creationDate, :culmination);";
                
                $parameters["salary"] = $jobOffer->getSalary();
                $parameters["nameCompany"] = $jobOffer->getNameCompany();
                $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
                $parameters["photo"] = $jobOffer->getPhoto();
                $parameters["creationDate"] = $jobOffer->getCreationDate();
                $parameters["culmination"] = $jobOffer->getCulmination();
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOException $ex){
                throw new PDOException("Error: the job offer could not be saved. Try again.");
            }
        }

        public function GetAll(){
            try{
                $query = "SELECT * FROM ".$this->tableName;                
                $this->connection = Connection::GetInstance();
                $jobOfferResults = $this->connection->Execute($query);

                if(!empty($jobOfferResults)){
                    $jobOfferList = array();
                    foreach ($jobOfferResults as $row){
                        $jobOffer = new JobOffer();
                        $jobOffer->setId($row['id']);
                        $jobOffer->setSalary($row['salary']);
                        $jobOffer->setNameCompany($row['nameCompany']);
                        $jobOffer->setJobPositionId($row['jobPositionId']);
                        $jobOffer->setPhoto($row['photo']);
                        $jobOffer->setCreationDate($row['creationDate']);
                        $jobOffer->setCulmination($row['culmination']);
                        array_push($jobOfferList, $jobOffer);
                    }
                    return $jobOfferList;
                }
                else{
                    return null;
                }
            }catch (PDOException $ex){
                throw $ex;
            }
        }

        public function Edit($currentId, JobOffer $jobOfferEdit){

            try {
                $query = "UPDATE ".$this->tableName." SET salary = :salary, nameCompany = :nameCompany, jobPositionId = :jobPositionId, photo = :photo, culmination =:culmination WHERE (id = :currentId);";

                $parameters["salary"] = $jobOfferEdit->getSalary();
                $parameters["nameCompany"] = $jobOfferEdit->getNameCompany();
                $parameters["jobPositionId"] = $jobOfferEdit->getJobPositionId();
                $parameters["photo"] = $jobOfferEdit->getPhoto();
                $parameters["currentId"] = $currentId;
                $parameters["culmination"] = $jobOfferEdit->getCulmination();

                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            } catch (PDOException $ex){
                throw $ex;
            }
        }

        public function Delete($id){

            try {
                $query = "DELETE FROM ".$this->tableName." WHERE (id = :id);";
                $parameters['id'] = $id;
                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        public function Filter($data){

            try {
                $parameters['data'] = $data;
                $query = "SELECT * FROM ".$this->tableName." WHERE nameCompany like '%".$data."%' or salary  =:data or jobPositionId  =:data ;";
                                     //       WHERE simbolo LIKE '%".$search."%' OR color LIKE '%".$search."%' ";
                //$consulta = "SELECT * FROM telementos WHERE simbolo LIKE '%".$search."%' OR color LIKE '%".$search."%' ORDER BY noatomico LIMIT 6";
                //echo "<br><br>"; var_dump($query); echo "<br><br>";
                $this->connection = Connection::GetInstance();
                $jobOfferResults = $this->connection->Execute($query, $parameters);

                if(!empty($jobOfferResults)){
                    //$jobPositionPDO = new JobOfferPDO();
                    //$jobPositionList = $jobPositionPDO->GetAll();
                    $results = array();

                    foreach ($jobOfferResults as $row){
                        $jobOffer = new JobOffer();
                        $jobOffer->setId($row['id']);
                        $jobOffer->setSalary($row['salary']);
                        $jobOffer->setJobPositionId($row['jobPositionId']);
                        $jobOffer->setNameCompany($row['nameCompany']);
                        $jobOffer->setPhoto($row['photo']);
                        
                        array_push($results, $jobOffer);
                        /*
                        foreach($jobPositionList as $jobPosition){

                            if($jobPosition->getid() == $jobOffer->getId()){

                                break;
                                return $jobPosition->getDescription();
                            }
                        }
                        */
                    }
                    return $results;
                }
                else{
                    return null;
                }
            }catch(PDOException $ex){
                throw $ex;
            }
        }

    }    
?>
