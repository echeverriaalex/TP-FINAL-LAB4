<?php
     namespace PDO;

     use Models\JobOffer as JobOffer;
     use PDO\Connection as Connection;
     use PDOException;

    class JobOfferPDO implements IJobOfferPDO
    {
        private $connection;
        private $tableName = "jobOffers";

        public function Edit($currentName, JobOffer $jobOfferEdit){

            try {

                $query = "UPDATE ".$this->tableName." SET nameCompany = :nameCompany, jobPositionId = :jobPositionId, salary = :salary WHERE (nameCompany = :currentName);";

                $parameters["nameCompany"] = $jobOfferEdit->getNameCompany();
                $parameters["jobPositionId"] = $jobOfferEdit->getJobPositionId();
                $parameters["salary"] = $jobOfferEdit->getSalary();
              

                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;

            } catch (PDOException $ex) {

                throw $ex;
            }
        }

        public function Delete($companyName){

            try {
                $query = "DELETE FROM ".$this->tableName." WHERE (nameCompany = :nameCompany);";
                $parameters['nameCompany'] = $companyName;
                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            
            } catch (PDOException $ex) {
                throw $ex;
            }
        }


        public function Add(JobOffer $jobOffer)
        {
            try{
                $query = "INSERT INTO ".$this->tableName." (id, nameCompany, jobPositionId, salary) VALUES (:id, :nameCompany, :jobPositionId, :salary);";
                $parameters["id"] = $jobOffer->getId();
                $parameters["nameCompany"] = $jobOffer->getNameCompany();
                $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
                $parameters["salary"] = $jobOffer->getSalary();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOExpection $ex)
            {
                throw $ex;
            }
        }

        public function Filter($nameCompany){
            
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
        }

        public function GetAll(){


            try{

                $jobOfferList = array();
                $query = "SELECT * FROM ".$this->tableName;
                
                $this->connection = Connection::GetInstance();
                $jobOfferResults = $this->connection->Execute($query);


                foreach ($jobOfferResults as $row)
                {
                    $jobOffer = new JobOffer();
                    $jobOffer->setNameCompany($row['nameCompany']);
                    $jobOffer->setJobPositionId($row['jobPositionId']);
                    $jobOffer->setSalary($row['salary']);
                }
                return $jobOfferList;
            }catch (PDOException $ex){
                throw $ex;
            }



        }

        
    }
    
?>


