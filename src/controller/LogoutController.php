<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/UserRepository.php';

class LogoutController extends AbstractController
{
    public function index()
    {
        $user = new UserRepository($this->pdo);
        $user->deleteCookie();
        session_destroy();
        header('Location: /login');
    }
}