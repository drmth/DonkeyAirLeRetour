<?php

include dirname(__DIR__).'/repository/UserRepository.php';
include dirname(__DIR__).'/repository/BookingRepository.php';

class AccountController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $user_id = $_COOKIE["donkey_air_user_id"];
        $userObject = new UserRepository($this->pdo);
        $user = $userObject->getUserInfo($user_id);
        $bookingObject = new BookingRepository($this->pdo);
        $bookingList = $bookingObject->getBookingList($user_id);
        if ($bookingList == false) {
            $bookingList = [];
        }
        include dirname(__DIR__).'/view/AccountView.php';
    }
}