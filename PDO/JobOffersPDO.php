<?php
     namespace PDO;
     use Models\JobOffer;
     use PDO\Connection;
     use PDOException;

    class JobOfferPDO implements IJobOfferPDO
    {
        private $connection;
        private $tableName = "JobOffers";




        public function Edit($currentName, JobOffer $jobOfferEdit){

            try {

                $query = "UPDATE ".$this->tableName." SET companyName = :companyName, jobPositionId = :jobPositionId, salary = :salary WHERE (companyName = :currentName);";

                $parameters["companyName"] = $jobOfferEdit->getCompanyName();
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
                $query = "DELETE FROM ".$this->tableName." WHERE (companyName = :companyName);";
                $parameters['companyName'] = $companyName;
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
                $query = "INSERT INTO".$this->tableName."(companyName, jobPositionId, salary) VALUES (:companyName, jobPositionId, salary);";
                $parameters["companyName"] = $jobPosition->getCompanyName();
                $parameters["jobPositionId"] = $jobPosition->getJobPositionId();
                $parameters["salary"] = $jobPosition->getSalary();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOExpection $ex)
            {
                throw $ex;
            }
        }


        public function GetAll(){


            try{

                $jobOfferList = array();
                $query = "SELECT * FROM ".$this->tableName;
                
                $this->connection = Connection::GetInstance();
                $jobOfferResults = $this->conection->Execute($query);


                foreach ($jobOfferResults as $row)
                {
                    $jobOffer = new JobOffer();
                    $jobOffer->setCompanyName($row['companyName']);
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


