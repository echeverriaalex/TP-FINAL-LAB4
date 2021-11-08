<?php
    namespace DAO;

    use Models\Career as Career;

    class CareerDAO{

        private $careerList = array();

        public function getAll(){

            $this->retrieveDataAPI();
            return $this->careerList;
        }

        public function retrieveDataAPI(){

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