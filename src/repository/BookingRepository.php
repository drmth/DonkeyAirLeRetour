<?php

include dirname(__DIR__).'/model/Booking.php';

class BookingRepository extends AbstractRepository
{
    public function getBookingList($userId)
    {
        $query = 'SELECT bookings.id as booking_id, bookings.*, flights.id as flight_id, flights.*, users.lastname, users.firstname, options.id as option_id, options.*
            FROM bookings 
            INNER JOIN flights ON flights.id = bookings.flight_id 
            INNER JOIN users ON users.id = bookings.user_id 
            INNER JOIN options ON options.id = bookings.option_id 
            WHERE users.id = :user_id
            ORDER BY bookings.reservation_date ASC';
        $statement= $this->pdo->prepare($query);
        $statement->bindValue(':user_id', $userId);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, Booking::class);
    }
    public function deleteBooking($bookingId)
    {
        $query = 'DELETE FROM bookings where id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $bookingId);
        $statement->execute();
    }
}