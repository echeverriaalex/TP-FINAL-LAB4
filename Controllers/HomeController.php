<?php
    namespace Controllers;    

    class HomeController{
        public static function Index(){
            
            require_once(VIEWS_PATH."select-nav.php");
            require(VIEWS_PATH."home.php");
        }
    }      
?>