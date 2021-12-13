<?php
    namespace DAO;
    use Models\User as User;

    interface IUserPDO{

        function Add(User $user);
        function GetAll();
    }
?>