<?php
    namespace DAO;
    use DAO\ICompanyPDO;
    use Models\Company;
    use DAO\Connection;
    use PDOException;
    use Exception;

    class CompanyPDO implements ICompanyPDO{

        private $connection;
        private $tableName ="companies";

        public function Add(Company $company){

            try{
                $query = "INSERT INTO ".$this->tableName."(nameCompany, address, phone, cuit, email, passwordCompany, roleCompany) VALUES (:nameCompany, :address, :phone, :cuit, :email, :passwordCompany, :roleCompany );";
                $parameters["nameCompany"] = $company->getName();
                $parameters["address"] = $company->getAddress();
                $parameters["phone"] = $company->getPhone();
                $parameters["cuit"] = $company->getCuit();
                $parameters["email"] = $company->getEmail();
                $parameters["passwordCompany"] = $company->getPassword();
                $parameters["roleCompany"] = $company->getRole();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(PDOException $ex){

                throw new Exception("Error: The company could not be registered. Try again.");
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
                    $company->setEmail($row['email']);
                    array_push($companyList, $company);
                }
                return $companyList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        public function SearchCompany($email){
            
            try {
                $parameters['email'] = $email;
                $query = "SELECT * FROM ".$this->tableName." WHERE (email = :email);";
                $this->connection = Connection::GetInstance();
                $companyResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($companyResults)){
                    foreach ($companyResults as $row) {
                        $company = new Company();
                        $company->setName($row['nameCompany']);
                        $company->setAddress($row['address']);
                        $company->setPhone($row['phone']);
                        $company->setCuit($row['cuit']);
                        $company->setEmail($row['email']);
                        $company->setPassword($row['passwordCompany']);
                        $company->setRole($row['roleCompany']);
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
    }
?>