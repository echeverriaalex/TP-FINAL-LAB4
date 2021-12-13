<?php
    namespace DAO;

    class SessionCheck{

        public static function Check(){
            return (!empty($_SESSION['userlogged']));
        }
    }
?>