<?php
     namespace PDO;
     use Models\JobOffer;
     use PDO\Connection;
     use PDOException;

    class JobOfferPDO implements IJobOfferPDO
    {
        private $connection;
        private $tableName = "job_offers";
        
        public function Add(JobOffer $jobOffer){

            try{
                $query = "INSERT INTO ".$this->tableName." (salary, company_id, job_position_id) VALUES (:salary, :company_id, :job_position_id);";
               
                $parameters["salary"] = $jobOffer->getSalary();
                $parameters["company_id"] = $jobOffer->getCompanyId();
                $parameters["job_position_id"] = $jobOffer->getJobPositionId();

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
                        $jobOffer->setCompanyId($row['company_id']);
                        $jobOffer->setJobPositionId($row['job_position_id']);
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

                $query = "UPDATE ".$this->tableName." SET salary = :salary, company_id = :company_id, job_position_id = :job_position_id WHERE (id = :currentId);";

                $parameters["salary"] = $jobOfferEdit->getSalary();
                $parameters["company_id"] = $jobOfferEdit->getCompanyId();
                $parameters["job_position_id"] = $jobOfferEdit->getJobPositionId();
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
    }    
?>
