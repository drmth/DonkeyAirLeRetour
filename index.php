<?php

session_start();

global $controller;
$action = 'index';

if (!isset($_COOKIE['donkey_air_user_id'])) {
    global $controller;
    header('Location:/index.php/login');
}
if ($_SERVER['REQUEST_URI'] == 'login') {
    global $controller;
    $controller = 'LoginController.php';
}
if ($_SERVER['REQUEST_URI'] == '/index.php') {
    global $controller;
    $controller = 'Homecontroller';
}
if ($_SERVER['REQUEST_URI'] == '/account') {
    global $controller;
    $controller = 'AccountController';
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