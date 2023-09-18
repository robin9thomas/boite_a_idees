<?php

define('DB_HOST','localhost'); 
define('DB_NAME','boite_a_idees');    
define('DB_USER','root');    
define('DB_PASS','root');
define('CLASS_PATH','class/');


$DB_HOST = DB_HOST; 
$DB_NAME = DB_NAME;    
$DB_USER = DB_USER;    
$DB_PASS = DB_PASS;
$CLASS_PATH = CLASS_PATH;
//Autoloader
spl_autoload_register(function ($class_name) {
    include CLASS_PATH.$class_name . '.class.php';
});

$mysql = new bdd($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$mysql->connect();
