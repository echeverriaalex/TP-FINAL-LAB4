<?php
    namespace PDO;
    use Models\Student as Student;

    interface IStudentPDO{
        
        function Add(Student $student);
        function GetAll();
    }
?>