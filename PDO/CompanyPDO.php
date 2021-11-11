<?php
    namespace PDO;
    use Controllers\CompanyController;
    use PDO\ICompanyPDO;
    use Models\Company;
    use PDO\Connection;
    use PDOException;

    class CompanyPDO implements ICompanyPDO{

        private $connection;
        private $tableName ="companies";

        public function Add(Company $company){

            try{
                $query = "INSERT INTO ".$this->tableName."(nameCompany, address, phone, cuit) VALUES (:nameCompany, :address, :phone, :cuit);";
                $parameters["nameCompany"] = $company->getName();
                $parameters["address"] = $company->getAddress();
                $parameters["phone"] = $company->getPhone();
                $parameters["cuit"] = $company->getCuit();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
                echo "<script> alert('La empresa se agrego exitosamente.');</script>";

            }catch(PDOException $ex){

                //throw $ex;
                echo "<script> alert('Error al ingresar la empresa contiene un dato ya registrado anteriormente. Reintente con una empresa totalmente nueva.');</script>";
                //$companyController = new CompanyController();
                //$companyController->ShowAddView();
                //require_once(VIEWS_PATH.)
                //require_once(VIEWS_PATH."company-add.php");
            }
        }

        public function Filter($nameCompany){
            
            try {

                $parameters['nameCompany'] = $nameCompany;
                $query = "SELECT * FROM ".$this->tableName." WHERE (nameCompany = :nameCompany);";

                $this->connection = Connection::GetInstance();
                $companyResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($companyResults)){
                    
                    foreach ($companyResults as $row) {

                        $company = new Company();
                        $company->setName($row['nameCompany']);
                        $company->setAddress($row['address']);
                        $company->setPhone($row['phone']);
                        $company->setCuit($row["cuit"]);
                    }
                    return $company;
                }
                else{
                    return null;
                }

            }catch(PDOException $ex) {
                throw $ex;
            }
        }

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
                echo "<script> alert('La empresa se edito exitosamente.');</script>";
                return $deletedCount;

            } catch (PDOException $ex) {

                throw $ex;
                echo "<script> alert('Error al editar la empresa. Reintente nuevamente.');</script>";
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

        public function GetAll(){
            
            try {
                $companyList = array();
                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();
                $companyResults = $this->connection->Execute($query);

                foreach ($companyResults as $row) {

                    $company = new Company();
                    $company->setName($row['nameCompany']);
                    $company->setAddress($row['address']);
                    $company->setPhone($row['phone']);
                    $company->setCuit($row["cuit"]);
                    array_push($companyList, $company);
                }
                return $companyList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }
?>