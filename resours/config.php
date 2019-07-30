<?php


ob_start();

session_start();
//path config 

defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR); // DS 3arftha bach tali hiya shlach (/)

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

//db config

defined("DH_HOST") ? null : define("DH_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");

defined("DB_NAME") ? null : define("DB_NAME", "db_ecom");

$connection = mysqli_connect(DH_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(!$connection){
    echo "sorry we cant connect to database";
}


require_once("functions.php");

?>