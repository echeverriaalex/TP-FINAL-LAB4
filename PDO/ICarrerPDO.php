<?php
    namespace PDO;

    use Models\Career;

    interface ICareerPDO
    {
        function Add(Career $career);
        function GetAll();
    }
?>