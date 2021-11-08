<?php
    namespace PDO;

    class SessionCheck{

        public static function Check(){

            $result = false;
            if(!empty($_SESSION['userlogged'])){
                $result = true;
            }
            return $result;
        }
    }
?>