<?php
    namespace DAO;
    use Models\Company as Company;

    interface ICompanyPDO{
        
        function Add(Company $company);
        function GetAll();
    }
?>