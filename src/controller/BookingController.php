<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/BookingRepository.php';

class BookingController extends AbstractController
{
    public function delete()
    {
        $booking = new BookingRepository($this->pdo);
        $booking->deleteBooking($this->id);
        header('Location:/account');
    }
    public function update() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $booking = new BookingRepository($this->pdo);
            $booking->updateBooking($this->id, $_POST['nbr_luggage'], $_POST['meal']);
            header('Location: /account');
            exit;
        }
        include dirname(__DIR__).'/view/UpdateBookingView.php';
    }
    public function add()
    {
        $flightId = substr($this->id, 0, 1);
        $luggage = substr($this->id, 2, 1);
        $meal = substr($this->id, 4, 1);
        $booking = new BookingRepository($this->pdo);
        $booking->addBooking($flightId, $luggage, $meal);
        header('Location:/account');
    }
}