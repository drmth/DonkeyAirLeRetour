<?php

session_start();

$controller = 'HomeController';
$action = 'index';
$id = null;

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
if (str_contains($_SERVER['REQUEST_URI'],'/account/delete')) {
    $action = 'delete';
    $id = explode('/', $_SERVER['REQUEST_URI'])[3];
    $controller = 'BookingController';
}
if (str_contains($_SERVER['REQUEST_URI'],'/account/update')) {
    $action = 'update';
    $id = explode('/', $_SERVER['REQUEST_URI'])[3];
    $controller = 'BookingController';
}
if (str_contains($_SERVER['REQUEST_URI'],'/add')) {
    $action = 'add';
    $id = explode('/', $_SERVER['REQUEST_URI'])[2];
    $controller = 'BookingController';
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
$controller = new $controller($pdo, $id);
$controller->$action();