<?php
     namespace PDO;
     use Models\JobOffer;
     use PDO\Connection;
     use PDOException;

    class JobOfferPDO implements IJobOfferPDO
    {
        private $connection;
        private $tableName = "jobOffers";
        
        public function Add(JobOffer $jobOffer){

            try{
                $query = "INSERT INTO ".$this->tableName." (salary, nameCompany, jobPositionId) VALUES (:salary, :nameCompany, :jobPositionId);";
               
                $parameters["salary"] = $jobOffer->getSalary();
                $parameters["nameCompany"] = $jobOffer->getNameCompany();
                $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
                

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOException $ex)
            {
                throw $ex;
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

                $query = "UPDATE ".$this->tableName." SET salary = :salary, nameCompany = :nameCompany, jobPositionId = :jobPositionId WHERE (id = :currentId);";

                $parameters["salary"] = $jobOfferEdit->getSalary();
                $parameters["nameCompany"] = $jobOfferEdit->getNameCompany();
                $parameters["jobPositionId"] = $jobOfferEdit->getJobPositionId();
                $parameters["currentId"] = $currentId;

                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;

            } catch (PDOException $ex) {

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

        public function Filter($nameCompany){

            /*
            try {

                $parameters['nameCompany'] = $nameCompany;
                $query = "SELECT * FROM ".$this->tableName." WHERE (nameCompany = :nameCompany);";

                $this->connection = Connection::GetInstance();
                $jobOfferResults = $this->connection->Execute($query, $parameters);

                if(!empty($jobOfferResults)){

                    foreach ($jobOfferResults as $row) {

                        $jobOffer = new JobOffer();
                        $jobOffer->setId($row['id']);
                        $jobOffer->setSalary($row['salary']);
                        $jobOffer->setNameCompany($row['nameCompany']);
                        $company->setJobPositionId($row["jobPositionId"]);
                    }
                    return $jobOffer;
                }
                else{
                    return null;
                }

            }catch(PDOException $ex) {
                throw $ex;
            }
            */
        }

    }    
?>
