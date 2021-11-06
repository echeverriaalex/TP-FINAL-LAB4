<?php
    namespace DAO;

    use DAO\IJobOfferPDO as IJobOfferPDO;
    use DAO\JobOfferPDO as JobOfferPDO;
    use Models\JobOffer as JobOffer;
    use PDOException;

    class JobOfferPDO implements IJobOfferPDO
    {
        private $connection;
        private $tableName = "JobOffers";


        public function Add(JobOffer $jobOffer)
        {
            try{
                $query = "INSERT INTO".$this->tableName."(companyName, jobPosition, salary) VALUES (:companyName, jobPosition, salary);";
                $parameters["companyName"] = $jobPosition->getCompanyName();
                $parameters["jobPosition"] = $jobPosition->getJobPosition();
                $parameters["salary"] = $jobPosition->getSalary();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOExpection $ex)
            {
                throw $ex;
            }
        }


        public function GetAll(){


            try{

                $jobOfferList = array();
                $query = "SELECT * FROM ".$this->tableName;
                
                $this->connection = Connection::GetInstance();
                $jobOfferResults = $this->conection->Execute($query);


                foreach ($jobOfferResults as $row)
                {
                    $jobPosition = new JobPosition();
                    $jobPosition->setCompanyName($row['companyName']);
                    $jobPosition->setJobPosition($row['jobPosition']);
                    $jobPosition->setSalary($row['salary']);
                }
                return $jobOfferList;
            }catch (PDOException $ex){
                throw $ex;
            }



        }
    }
    
?>