<?php
    namespace Controllers;

    class AdministratorController{

        public function ShowAddView(){

            require_once(VIEWS_PATH."select-nav.php");
            require_once(VIEWS_PATH."administrator-add.php");
        }



    }

?>