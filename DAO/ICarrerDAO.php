<?php
    namespace DAO;

    use Models\Career;

    interface ICareerDAO
    {
        function Add(Career $career);
        function GetAll();
    }
?>