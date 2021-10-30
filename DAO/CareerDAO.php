<?php
    namespace DAO;
    use Models\Career;

    class CareerDAO{

        private $careerList = array();

        public function GetAll(){

            $this->RetrieveDataAPI();
            return $this->careerList;
        }

        public function RetrieveDataAPI(){

            $opt = array(
                    "http"=> array(
                            "method" => "GET",
                            "header" => Header_Name.": ".Header_Value."\r\n"
                )
            );
    
            $ctx = stream_context_create($opt);
            $jsonContent = file_get_contents(Request_URL_Career, false, $ctx);
    
            $this->careerList = array();
            $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array ();
    
            foreach($arrayToDecode as $valuesArray){

                $career = new Career($valuesArray['careerId'], $valuesArray['description'], $valuesArray['active']);
                array_push($this->careerList, $career);
            }
        }

    }
?>