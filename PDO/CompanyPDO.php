<?php
    namespace PDO;

    use PDO\ICompanyPDO;
    use Models\Company;
    use PDO\Connection;
    use PDOException;

    class CompanyPDO implements ICompanyPDO{

        private $connection;
        private $tableName ="Companies";

        public function Add(Company $company){

            try{

                $query = "INSERT INTO ".$this->tableName."(nameCompany, address, phone, cuit) 
                VALUES (:nameCompany, :address, :phone, :cuit);";

                $parameters["nameCompany"] = $company->getName();
                $parameters["address"] = $company->getAddress();
                $parameters["phone"] = $company->getPhone();
                $parameters["cuit"] = $company->getCuit();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(PDOException $ex){

                throw $ex;
            }
        }


        public function Filter ($companyName)
        {
            $this->RetrieveData();

            $companyResult = new Company;

            foreach($this->companyList as $company)
            {
                if($company->getName() == $companyName)
                {
                    $companyResult = $company;
                    break;
                }
            }

            return $companyResult;
        
        }

        public function Edit($currentName, Company $companyEdit){

            $this->RetrieveData();

            foreach($this->companyList as $key => $company){

                if($company->getName() == $currentName){
                    
                    $this->companyList[$key] = $companyEdit;

                }
                
            }
            $this->SaveData();
        }

        public function Delete($companyName){

            $this->RetrieveData();
            
            foreach($this->companyList as $key => $company){

                if($company->getName() == $companyName){

                    unset($this->companyList[$key]);
                }
            }
            $this->SaveData();
        }

        public function GetAll(){
            
            $this->RetrieveData();
            return $this->companyList;
        }
        
        private function SaveData(){

            $arrayToEncode = array();

            foreach($this->companyList as $company){

                $valuesArray['name'] = $company->getName();
                $valuesArray['address'] = $company->getAddress();
                $valuesArray['phone'] = $company->getPhone();
                $valuesArray['cuit'] = $company->getCuit();
                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            file_put_contents('Data/companies.json', $jsonContent);
        }

        private function RetrieveData(){

            $this->companyList = array();

            if(file_exists('Data/companies.json')){

                $jsonContent = file_get_contents('Data/companies.json');
                $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray){

                    $company = new Company();
                    $company->setName($valuesArray['name']);
                    $company->setAddress($valuesArray['address']);
                    $company->setPhone($valuesArray['phone']);
                    $company->setCuit($valuesArray['cuit']);
                    array_push($this->companyList, $company);
                }
            }            
        }
    }
?>