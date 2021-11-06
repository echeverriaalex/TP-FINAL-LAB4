<?php
    namespace DAO;

    use DAO\IJobPositionDAO as IJobPositionDAO;
    use DAO\JobPositionDAO as JobPositionDAO;
    use Models\JobPosition as JobPosition;
    use PDOException;

    class JobPositionPDO implements IJobPositionPDO
    {
        private $connection;
        private $tableName = "JobPositions";


        public function Add(JobPosition $jobPosition)
        {
            try{
                $query = "INSERT INTO".$this->tableName."(jobPositionId, careerId, descrtiption) VALUES (:jobPositionId, careerId, description);";
                $parameters["jobPositionId"] = $jobPosition->getJobPositionId();
                $parameters["careerId"] = $jobPosition->getCareerId();
                $parameters["description"] = $jobPosition->getDescription();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOExpection $ex)
            {
                throw $ex;
            }
        }









        public function GetAll(){


            try{

                $jobPositionList = array();
                $query = "SELECT * FROM ".$this->tableName;
                
                $this->connection = Connection::GetInstance();
                $jobPositionResults = $this->conection->Execute($query);


                foreach ($jobPositionResults as $row)
                {
                    $jobPosition = new JobPosition();
                    $jobPosition->setJobPositionId($row['jobPositionId']);
                    $jobPosition->setCareerId($row['careerId']);
                    $jobPosition->setDescription($row['description']);
                }
                return $jobPositionList;
            }catch (PDOException $ex){
                throw $ex;
            }



        }
    }
    
?>