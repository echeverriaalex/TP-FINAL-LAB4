<?php
    if(!empty($_SESSION['userlogged'])){
        $roleUser = $_SESSION['userlogged']->getRole();
        switch($roleUser){
            case "student": require_once(VIEWS_PATH."nav-user.php"); break;
            case "admin": require_once(VIEWS_PATH."nav-admin.php"); break;
            case "company": require_once(VIEWS_PATH."nav-company.php"); break;
            default: require_once(VIEWS_PATH."nav.php"); break;
        }
    }
    else{
        require_once(VIEWS_PATH."nav.php");
    }    
?>