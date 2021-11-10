<?php
    namespace PDO;

    use PDO\IApplicationPDO as IApplicationPDO;
    use Models\Application as Application;
    use PDO\Connection as Connection;
    use PDOException;

    class ApplicationPDO implements IApplicationPDO{

        private $connection;
        private $tableName ="applications";

        public function Add(Application $application){

            try{
                $query = "INSERT INTO ".$this->tableName."(id, jobOfferId, studentId) VALUES (:id, :jobOfferId, :studentId);";
                $parameters["id"] = $application->getId();
                $parameters["jobOfferId"] = $application->getJobOfferId();
                $parameters["studentId"] = $application->getStudentId();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }catch(PDOException $ex){

                throw $ex;
            }
        }

        // BUSCA LA APPLICATION POR EL NOMBRE DE LA COMPANY

        public function Filter($nameCompany){
            
            try {

                $parameters['nameCompany'] = $nameCompany;
                $query = "SELECT a.id as App_ID, c.nameCompany as Company, jp.descriptionJob as Job_Position, ca.descriptionCareer as Career_Needed, jo.salary as Salary, s.firstName as Applicant 
                FROM " . $this->tableName . " 
                    a INNER JOIN jobOffers jo ON a.jobOfferId = jo.id
                    INNER JOIN jobPositions jp ON jo.jobPositionId = jp.jobPositionId
                    INNER JOIN companies c ON jo.nameCompany = c.nameCompany
                    INNER JOIN careers ca ON jp.careerId = ca.careerId
                    INNER JOIN students s ON a.studentId = s.studentId
                WHERE
                    c.nameCompany = :nameCompany
                ORDER BY
                    a.id, c.nameCompany, jp.descriptionJob, ca.descriptionCareer, jo.salary, s.firstName";

                $this->connection = Connection::GetInstance();
                $applicationResults = $this->connection->Execute($query, $parameters);
                
                if(!empty($applicationResults)){
                    
                    foreach ($applicationResults as $row) {

                        $application = new Application();
                        $application->setId($row['id']);
                        $application->setJobOfferId($row['jobOfferId']);
                        $application->setStudentId($row['studentId']);
                    }
                    return $application;
                }
                else{
                    return null;
                }

            }catch(PDOException $ex) {
                throw $ex;
            }
        }

        public function GetAll(){
            
            try {
                $companyList = array();
                $query = "SELECT a.id as App_ID, c.nameCompany as Company, jp.descriptionJob as Job_Position, ca.descriptionCareer as Career_Needed, jo.salary as Salary, s.firstName as Applicant 
                FROM " . $this->tableName . " 
                    a INNER JOIN jobOffers jo ON a.jobOfferId = jo.id
                    INNER JOIN jobPositions jp ON jo.jobPositionId = jp.jobPositionId
                    INNER JOIN companies c ON jo.nameCompany = c.nameCompany
                    INNER JOIN careers ca ON jp.careerId = ca.careerId
                    INNER JOIN students s ON a.studentId = s.studentId
                ORDER BY
                    a.id, c.nameCompany, jp.descriptionJob, ca.descriptionCareer, jo.salary, s.firstName";

                $this->connection = Connection::GetInstance();
                $applicationResults = $this->connection->Execute($query);

                foreach ($applicationResults as $row) {

                    $application = new Application();
                    $application->setId($row['nameCompany']);
                    $application->setJobOfferId($row['jobOfferId']);
                    $application->setStudentId($row['studentId']);
                    array_push($applicationList, $application);
                }
                return $applicationList;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }
?>