<?php

include dirname(__DIR__).'/model/Booking.php';

class BookingRepository extends AbstractRepository
{
    public function getBookingList($user_id)
    {
        $query = 'SELECT bookings.*, flights.*, users.lastname, users.firstname, options.* 
            FROM bookings 
            INNER JOIN flights ON flights.id = bookings.flight_id 
            INNER JOIN users ON users.id = bookings.user_id 
            INNER JOIN options ON options.id = bookings.option_id 
            WHERE users.id = :user_id';
        $statement= $this->pdo->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Booking::class);
    }
}