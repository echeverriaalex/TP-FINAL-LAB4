<?php
    namespace PDO;

    use Models\Career as Career;

    interface ICareerPDO
    {
        function Add(Career $career);
        function GetAll();
    }
?>