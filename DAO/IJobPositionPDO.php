<?php
    namespace DAO;
    use Models\JobPosition as JobPosition;

    interface IJobPositionPDO{

        function Add(JobPosition $jobPosition);
        function GetAll();
    }
?>