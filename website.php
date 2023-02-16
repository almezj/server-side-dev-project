<?php

/* session_start(); */
function load_config($config_file)
{
    global $Settings;
    $Settings = parse_ini_file((file_exists($config_file) ? $config_file : '../' . $config_file));

}


load_config('config.ini');

$db = new DB($Settings['db_host'], $Settings['db_port'], $Settings['db_user'], $Settings['db_pass'], $Settings['db_name'], false);

?>