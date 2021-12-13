<?php
    namespace DAO;
    use Models\Career as Career;
    use DAO\Connection as Connection;
    use PDOException;

    class CareerPDO{

        private $connection;
        private $tableName = "careers";
        public static $careerListApi = array();

        /*
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

        // EN CASO DE NECESITAR MODIFICAR PARA QUE SEA CON CAREERS

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

        public function Delete($careerID){

            try {
                $query = "DELETE FROM ".$this->tableName." WHERE (careerId = :careerId);";
                $parameters['careerId'] = $careerID;
                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        public function UpdateCareerDatabase(){

            $careerListApi = $this->RetrieveDataAPI();
            
            foreach($careerListApi as $career){

                $this->Add($career);
            }
        }
        */

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

        public static function CheckExistenceCareerApiDescription($careerDescription){

            $result = null;
            if(!empty(self::$careerListApi)){
                $result = self::SearchCareerApi($careerDescription);
            }
            else{
                $careerPDO = new careerPDO();
                $careerPDO->RetrieveDataAPI();
                $result = self::SearchCareerApi($careerDescription);
            }
            return $result;
        }

        public static function SearchCareerApi($careerDescription){

            $result = null;
            if(!empty(self::$careerListApi)){
                foreach(self::$careerListApi as $career){
                    if($career->getDescription() == $careerDescription){
                        return $result = $career;
                    }
                }
            }
            return $result;
        }

        public static function CheckExistenceCareerApiID($careerId){

            $result = null;
            if(!empty(self::$careerListApi)){
                $result = self::SearchCareerApiID($careerId);
            }
            else{
                $careerPDO = new careerPDO();
                $careerPDO->RetrieveDataAPI();
                $result = self::SearchCareerApiID($careerId);
            }
            return $result;
        }

        public static function SearchCareerApiID($careerId){

            $result = null;
            if(!empty(self::$careerListApi)){
                foreach(self::$careerListApi as $career){
                    if($career->getCareerId() == $careerId){
                        return $result = $career;
                    }
                }
            }
            return $result;
        }
        
        public function GetAll(){
            
            try {                
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $careerResults = $this->connection->Execute($query);

                if(!empty($careerResults)){
                    $careerList = array();
                    foreach ($careerResults as $row) {
                        $career = new Career();
                        $career->setCareerId($row['careerId']);
                        $career->setDescription($row['descriptionCareer']);
                        $career->setActive($row['statusCareer']);
                        array_push($careerList, $career);
                    }
                    return $careerList;
                }
                else{
                    return null;
                }
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        public static function getCareerListApi(){

            if(empty(self::$careerListApi)){
                $careerPDO = new careerPDO();
                $careerPDO->RetrieveDataAPI();
                return self::$careerListApi;
            }
            else{
                return self::$careerListApi;
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

            if(!empty($jsonContent)){
                $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array ();    
                foreach($arrayToDecode as $valuesArray){

                    $career = new Career($valuesArray['careerId'], $valuesArray['description'], $valuesArray['active']);
                    array_push(self::$careerListApi, $career);
                }
                //return $careerListApi;
            }
            else{
                self::$careerListApi = $this->GetAll();
                return self::$careerListApi;
            }
        }
    }
?>