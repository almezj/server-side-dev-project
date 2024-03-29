<?php

//Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Require DB class
require 'Library/DB.php';

session_start();
function load_config($config_file)
{
    global $Settings;
    $Settings = parse_ini_file((file_exists($config_file) ? $config_file : '../' . $config_file));

}

function loader_of_classes($class_name)
{
    $file = str_replace('\\', '/', $class_name) . '.php';
    require_once ((file_exists('Library/' . $file)) ? 'Library/' . $file : '../Library/' . $file);

}


spl_autoload_register('loader_of_classes');

//Load config file
load_config('config.ini');

//Create global db object
$db = new DB($Settings['db_host'], $Settings['db_port'], $Settings['db_user'], $Settings['db_pass'], $Settings['db_name']);



?>