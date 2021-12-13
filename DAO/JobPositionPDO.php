<?php
    namespace DAO;
    use Models\JobPosition;
    use DAO\Connection;
    use DAO\IJobPositionPDO;
    use PDOException;

    class JobPositionPDO implements IJobPositionPDO{

        private $connection;
        private $tableName = "jobPositions";
        public static $jobPositionListApi = array();

        public function Add(JobPosition $jobPosition){
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

        /*
        public function UpdateJobPositionDatabase(){

            //$jobPositionList = $this->RetrieveDataAPI();

            foreach(self::$jobPositionListApi as $jobPosition){

                $this->Add($jobPosition);
            }
        }
        */

        public function Filter($data){

            try {
                $parameters['data'] = $data;
                $query = "SELECT * FROM ".$this->tableName." WHERE descriptionJob like '%".$data."%'  ;";
                $this->connection = Connection::GetInstance();
                $jobPositionResults = $this->connection->Execute($query, $parameters);

                if(!empty($jobPositionResults)){
                    $results = array();
                    foreach ($jobPositionResults as $row){
                        $jobPosition = new JobPosition();
                        $jobPosition->setId($row['jobPositionId']);
                        $jobPosition->setDescription($row['descriptionJob']);
                        $jobPosition->setCareerId($row['careerId']);
                        array_push($results, $jobPosition);
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

        public static function getJobPositionListApi(){

            if(empty(self::$jobPositionListApi)){

                $jobPositionPDO = new JobPositionPDO();
                $jobPositionPDO->RetrieveDataAPI();
                return self::$jobPositionListApi;
            }
            else{
                return self::$jobPositionListApi;
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

            if(!empty($jsonContent)){
                
                $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array ();
        
                foreach($arrayToDecode as $valuesArray){

                    $career = new JobPosition($valuesArray['jobPositionId'], $valuesArray['description'], $valuesArray['careerId']);
                    array_push(self::$jobPositionListApi, $career);
                }
                //return $careerListApi;
            }
            else{

                self::$jobPositionListApi = $this->GetAll();
                return self::$jobPositionListApi;
            }
        }
    }    
?>