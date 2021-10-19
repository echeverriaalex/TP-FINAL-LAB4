<?php
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder
    define("FRONT_ROOT", "/TP-FINAL-LAB4/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
    define("Header_Name","x-api-key");
    define("Header_Value","4f3bceed-50ba-4461-a910-518598664c08");
    define("Request_URL_Career","https://utn-students-api.herokuapp.com/api/Career");
    define("Request_URL_JobPosition","https://utn-students-api.herokuapp.com/api/JobPosition");
    define("Request_URL_Students","https://utn-students-api.herokuapp.com/api/Student");
?>