<?php

include dirname(__DIR__).'/model/Booking.php';

class BookingRepository
{
    private $pdo;

    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }

    public function getBookingList($user_id)
    {
        $query = 'SELECT bookings.*, flights.*, user_infos.lastname, user_infos.firstname, options.* 
            FROM bookings 
            INNER JOIN flights ON flights.id = bookings.flight_id 
            INNER JOIN user_infos ON user_infos.id = bookings.user_id 
            INNER JOIN options ON options.id = bookings.option_id 
            WHERE user_infos.id = ' . $_COOKIE["donkey_air_user_id"];;
        $statement= $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Booking::class);
    }
}