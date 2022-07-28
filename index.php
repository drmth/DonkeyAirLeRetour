<?php

session_start();

$controller = 'HomeController';
$action = 'index';

if (!isset($_COOKIE['donkey_air_user_id'])) {
    $controller = 'LoginController';
}
if ($_SERVER['REQUEST_URI'] == '/login') {
    $controller = 'LoginController';
}
if ($_SERVER['REQUEST_URI'] == '/account') {    

    $controller = 'AccountController';
}
if ($_SERVER['REQUEST_URI'] == '/covid') {
    $controller = 'CovidController';
}
if ($_SERVER['REQUEST_URI'] == '/logout') {
    $controller = 'LogoutController';
}
function getPDO()
{
    require_once('DBHandler.php');
    $db = new DBHandler();

    if ($db->getInstance() === null) {
        die("No database connection");
    }

    return $db->getInstance();
}

include dirname(__FILE__).'/src/controller/'.$controller.'.php';

$pdo = getPDO();
$controller = new $controller($pdo);
$controller->$action();