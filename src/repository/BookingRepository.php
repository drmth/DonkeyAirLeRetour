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
    public function addBooking($flightId, $luggage, $meal)
    {
        $query = 'INSERT INTO bookings(id, reservation_date, flight_id, user_id, option_id, luggage, meal) VALUES (NULL, reservation_date = :reservation_date, flight_id = :flight_id, user_id = :id, option_id = 0, luggage = :luggage, meal = :meal)' ;
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':reservation_date', '"' . date('Y-m-d') .'"');
        $statement->bindValue(':flight_id', $flightId);
        $statement->bindValue(':luggage', $luggage);
        $statement->bindValue(':meal', $meal);
        $statement->execute();
    }
    public function deleteBooking($bookingId)
    {
        $query = 'DELETE FROM bookings where id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $bookingId);
        $statement->execute();
    }
    public function updateBooking($bookingId, $luggage, $meal)
    {
        $query = 'UPDATE bookings SET luggage = :luggage, meal = :meal WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $bookingId);
        $statement->bindValue(':luggage', $luggage);
        $statement->bindValue(':meal', $meal);
        $statement->execute();
    }
}