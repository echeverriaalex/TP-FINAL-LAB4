<?php
    if(isset($_SESSION["email"])) {
        if($_SESSION["role"] == "admin"){ 
            require_once(VIEWS_PATH."nav-admin.php");
        } else {
            require_once(VIEWS_PATH."nav-user.php");
        }
    } else {
        require_once(VIEWS_PATH."nav.php");
    }
?>