<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/UserRepository.php';
include dirname(__DIR__).'/repository/BookingRepository.php';

class AccountController extends AbstractController
{
    public function index()
    {
        $userId = $_COOKIE["donkey_air_user_id"];
        $userObject = new UserRepository($this->pdo);
        $user = $userObject->getUserInfo($userId);
        $bookingObject = new BookingRepository($this->pdo);
        $bookingList = $bookingObject->getBookingList($userId);
        if ($bookingList == false) {
            $bookingList = [];
        }
        include dirname(__DIR__).'/view/AccountView.php';
    }
}