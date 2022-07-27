<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/UserRepository.php';

class LoginController extends AbstractController
{
    public function index() 
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $user_repo = new UserRepository($this->pdo);
            if ($user_repo->checkPassword($_POST['password'], $email)) {
                $user_repo->createCookie($user_repo->getUserId($email));
                header('Location: /');
                exit;
            }
        }
        include dirname(__DIR__).'/view/LoginView.php';
    }
}