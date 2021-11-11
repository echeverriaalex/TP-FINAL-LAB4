<?php
    namespace PDO;

    use Models\Company as Company;

    interface ICompanyPDO
    {
        function Add(Company $company);
        function GetAll();
    }
?>