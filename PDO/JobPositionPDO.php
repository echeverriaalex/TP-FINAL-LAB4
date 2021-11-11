<?php
    namespace PDO;
    use Models\JobPosition;
    use PDO\Connection;
    use PDO\IJobPositionPDO;
    use PDOException;

    class JobPositionPDO implements IJobPositionPDO{

        private $connection;
        private $tableName = "jobPositions";

        public function Add(JobPosition $jobPosition)
        {
            try{
                $query = "INSERT INTO ".$this->tableName." (jobPositionId, careerId, descriptionJob) VALUES (:jobPositionId, :careerId, :descriptionJob);";
                $parameters["jobPositionId"] = $jobPosition->getId();
                $parameters["careerId"] = $jobPosition->getCareerId();
                $parameters["descriptionJob"] = $jobPosition->getDescription();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOException $ex)
            {
                throw $ex;
            }
        }

        public function UpdateJobPositionDatabase(){

            $jobPositionListApi = $this->RetrieveDataAPI();

            foreach($jobPositionListApi as $jobPosition){

                $this->Add($jobPosition);
            }
        }

        public function GetAll(){

            try{
                
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $jobPositionResults = $this->connection->Execute($query);

                if(!empty($jobPositionResults)){
                    
                    $jobPositionList = array();
                    
                    foreach($jobPositionResults as $row){

                        $jobPosition = new JobPosition();
                        $jobPosition->setId($row['jobPositionId']);
                        $jobPosition->setCareerId($row['careerId']);
                        $jobPosition->setDescription($row['descriptionJob']);
                        array_push($jobPositionList, $jobPosition);
                    }
                    return $jobPositionList;
                }
                else{

                    return null;
                }               
            }catch (PDOException $ex){
                throw $ex;
            }
        }

        public function RetrieveDataAPI(){

            $opt = array(
                    "http"=> array(
                            "method" => "GET",
                            "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
                )
            );
    
            $ctx = stream_context_create($opt);
            $jsonContent = file_get_contents('https://utn-students-api.herokuapp.com/api/JobPosition', false, $ctx);
    
            $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array ();
            $careerListApi = array();
    
            foreach($arrayToDecode as $valuesArray){

                $career = new JobPosition($valuesArray['jobPositionId'], $valuesArray['description'], $valuesArray['careerId']);
                array_push($careerListApi, $career);
            }
            return $careerListApi;
        }
    }
    
?>


