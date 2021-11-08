<?php
    namespace PDO;
    use Models\Career;
    use PDO\Connection;
    use PDOException;

    class CareerPDO{

        private $connection;
        private $tableName = "Careers";

        public function Add(Career $newCareer){

            try{
                $query = "INSERT INTO ".$this->tableName." (careerId, descriptionCareer, statusCareer) VALUES (:careerId, :descriptionCareer, :statusCareer);";

                $parameters["careerId"] = $newCareer->getCareerId();
                $parameters["descriptionCareer"] = $newCareer->getDescription();
                $parameters["statusCareer"] = $newCareer->getActive();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(PDOException $ex){

                throw $ex;
            }
        }

        public function GetAll(){
            
            try {
                $careerList = array();
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $careerResults = $this->connection->Execute($query);

                foreach ($careerResults as $row) {

                    $career = new Career();
                    $career->setCareerId($row['careerId']);
                    $career->setDescription($row['descriptionCareer']);
                    $career->setActive($row['statusCareer']);
                    array_push($careerList, $career);
                }
                return $careerList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        /* EN CASO DE NECESITAR MODIFICAR PARA QUE SEA CON CAREERS

         public function Edit($currentName, Company $companyEdit){

            try {

                $query = "UPDATE ".$this->tableName." SET nameCompany = :nameCompany, address = :address, phone = :phone, cuit = :cuit WHERE (nameCompany = :currentName);";

                $parameters["nameCompany"] = $companyEdit->getName();
                $parameters["address"] = $companyEdit->getAddress();
                $parameters["phone"] = $companyEdit->getPhone();
                $parameters["cuit"] = $companyEdit->getCuit();                
                $parameters["currentName"] = $currentName;

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

        */

        public function UpdateCareerDatabase(){

            $careerListApi = $this->RetrieveDataAPI();
            
            foreach($careerListApi as $career){

                $this->Add($career);
            }
        }

        public function Filter($career){

            try {

                $parameters['descriptionCareer'] = $career;
                $query = "SELECT * FROM ".$this->tableName." WHERE (descriptionCareer = :descriptionCareer);";

                $this->connection = Connection::GetInstance();
                $careerResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($careerResults)){
                    
                    foreach ($careerResults as $row) {

                        $career = new Career();
                        $career->setCareerId($row['careerId']);
                        $career->setDescription($row['descriptionCareer']);
                        $career->setActive($row['statusCareer']);
                    }
                    return $career;
                }
                else{
                    return null;
                }

            }catch(PDOException $ex) {
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
            $jsonContent = file_get_contents('https://utn-students-api.herokuapp.com/api/Career', false, $ctx);
    
            $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array ();
            $careerListApi = array();
    
            foreach($arrayToDecode as $valuesArray){

                $career = new Career($valuesArray['careerId'], $valuesArray['description'], $valuesArray['active']);
                array_push($careerListApi, $career);
            }
            return $careerListApi;
        }
    }
?>