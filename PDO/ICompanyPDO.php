<?php
    namespace PDO;

    use Models\Company;

    interface ICompanyPDO
    {
        function Add(Company $company);
        function GetAll();
    }
?>