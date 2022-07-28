<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/BookingRepository.php';

class BookingController extends AbstractController
{
    public function delete()
    {
        $bookingObject = new BookingRepository($this->pdo);
        $bookingObject->deleteBooking($this->id);
        header('Location:/account');
    }
}