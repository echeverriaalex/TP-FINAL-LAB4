<?php
    namespace Controllers;

    use DAO\CompanyDAO;
    use DAO\StudentDAO;
    

    class HomeController
    {
        public function Index()
        {
            require_once(VIEWS_PATH."nav.php");
            require(VIEWS_PATH."home.php");
        }
    }       
?>